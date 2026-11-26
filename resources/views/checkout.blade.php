@extends('layouts.app')

@section('title', 'Оформление заказа')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/beats.css') }}">
    <link rel="stylesheet" href="{{ asset('css/licenses.css') }}">
    <style>
        .checkout {
            max-width: 900px;
            margin: 0 auto;
            padding: 50px 20px;
        }
        .checkout__title {
            font-size: 32px;
            text-align: center;
            margin-bottom: 40px;
            color: #363636;
        }
        .checkout__section {
            background-color: #363636;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid black;
        }
        .checkout__section-title {
            font-size: 22px;
            color: white;
            margin-bottom: 20px;
        }
        .checkout__cart-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #555;
            color: white;
        }
        .checkout__cart-item:last-child {
            border-bottom: none;
        }
        .checkout__cart-item img {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            object-fit: cover;
            margin-right: 15px;
        }
        .checkout__cart-item-title {
            flex: 1;
            font-size: 16px;
        }
        .checkout__cart-item-price {
            font-size: 16px;
            font-weight: bold;
            color: #DE0000;
        }
        
        /* Карточки лицензий */
        .checkout__licenses {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .checkout__license-card {
            background-color: #454545;
            border: 2px solid transparent;
            border-radius: 15px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }
        .checkout__license-card:hover {
            border-color: #DE0000;
            transform: translateY(-2px);
        }
        .checkout__license-card.selected {
            border-color: #DE0000;
            background-color: #555;
        }
        .checkout__license-card input[type="radio"],
        .checkout__license-card input[type="checkbox"] {
            position: absolute;
            opacity: 0;
        }
        .checkout__license-name {
            color: white;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .checkout__license-desc {
            color: #ccc;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .checkout__license-price {
            color: #DE0000;
            font-size: 20px;
            font-weight: bold;
        }
        
        .checkout__total {
            font-size: 24px;
            color: #363636;
            text-align: right;
            margin-top: 20px;
        }
        .checkout__total span {
            color: #DE0000;
            font-weight: bold;
        }
        
        .checkout__submit-btn {
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 30px auto 0;
            padding: 15px 30px;
            background-color: #DE0000;
            color: white;
            border: 1px solid black;
            border-radius: 15px;
            font-size: 18px;
            font-family: 'IstokWeb-Regular', sans-serif;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .checkout__submit-btn:hover {
            background-color: #b80000;
            border-color: #b80000;
        }
        .checkout__submit-btn:disabled {
            background-color: #666;
            cursor: not-allowed;
        }
    </style>
@endpush

@section('content')
<div class="checkout">
    <h1 class="checkout__title">Оформление заказа</h1>

    @if(session('error'))
        <div style="color: #DE0000; text-align: center; margin-bottom: 20px;">{{ session('error') }}</div>
    @endif

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf

        <!-- Состав заказа -->
        <div class="checkout__section">
            <h2 class="checkout__section-title">Ваш заказ</h2>
            @foreach($cart as $id => $item)
                <div class="checkout__cart-item">
                    <img src="{{ asset('img/' . $item['cover_image']) }}" alt="{{ $item['title'] }}">
                    <div class="checkout__cart-item-title">
                        {{ $item['title'] }} × {{ $item['quantity'] }}
                    </div>
                    <div class="checkout__cart-item-price">
                        {{ number_format((float) $item['price'] * (int) $item['quantity'], 0, ',', ' ') }} ₽
                    </div>
                </div>
            @endforeach
            <div class="checkout__total" style="color: white;">
                Сумма битов: <span>{{ number_format($cartTotal, 0, ',', ' ') }} ₽</span>
            </div>
        </div>

        <!-- Блок 1: Лицензии на биты (обязательный выбор) -->
        <div class="checkout__section">
            <h2 class="checkout__section-title">1. Выберите лицензию на биты *</h2>
            <div class="checkout__licenses">
                @foreach($beatLicenses as $license)
                    <label class="checkout__license-card" onclick="selectBeatLicense(this)">
                        <input type="radio" name="license_id" value="{{ $license->id }}" required>
                        <div class="checkout__license-name">{{ $license->name }}</div>
                        <div class="checkout__license-desc">{{ $license->description }}</div>
                        <div class="checkout__license-price">{{ number_format((float) $license->price, 0, ',', ' ') }} ₽</div>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Блок 2: Дополнительные услуги (необязательный выбор) -->
        <div class="checkout__section">
            <h2 class="checkout__section-title">2. Дополнительные услуги (необязательно)</h2>
            <div class="checkout__licenses">
                @foreach($serviceLicenses as $service)
                    <label class="checkout__license-card" onclick="toggleService(this)">
                        <input type="checkbox" name="services[]" value="{{ $service->id }}" 
                               data-price="{{ (float) $service->price }}">
                        <div class="checkout__license-name">{{ $service->name }}</div>
                        <div class="checkout__license-desc">{{ $service->description }}</div>
                        <div class="checkout__license-price">{{ number_format((float) $service->price, 0, ',', ' ') }} ₽</div>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Итоговая сумма -->
        <div class="checkout__total">
            Итого к оплате: <span id="totalAmount">{{ number_format($cartTotal, 0, ',', ' ') }} ₽</span>
        </div>

        <button type="submit" class="checkout__submit-btn" id="submitBtn" disabled>
            Подтвердить заказ
        </button>
    </form>
</div>

<script>
    const cartTotal = {{ $cartTotal }};
    let selectedLicensePrice = 0;

    function selectBeatLicense(card) {
        // Убираем выделение со всех карточек лицензий на биты (radio)
        const beatSection = card.closest('.checkout__section');
        beatSection.querySelectorAll('.checkout__license-card').forEach(c => c.classList.remove('selected'));
        
        // Выделяем выбранную
        card.classList.add('selected');
        
        // Получаем цену лицензии
        const priceText = card.querySelector('.checkout__license-price').textContent;
        selectedLicensePrice = parseFloat(priceText.replace(/\s/g, '').replace('₽', '').trim());
        
        updateTotal();
        checkSubmitButton();
    }

    function toggleService(card) {
        // Toggle выделение для доп. услуг (checkbox)
        card.classList.toggle('selected');
        
        // Синхронизируем checkbox с кликом по карточке
        const checkbox = card.querySelector('input[type="checkbox"]');
        // checkbox.toggle() вызывается автоматически при клике на label
        
        updateTotal();
    }

    function updateTotal() {
        let servicesTotal = 0;
        document.querySelectorAll('input[name="services[]"]:checked').forEach(checkbox => {
            servicesTotal += parseFloat(checkbox.dataset.price);
        });

        const total = cartTotal + selectedLicensePrice + servicesTotal;
        document.getElementById('totalAmount').textContent = total.toLocaleString('ru-RU') + ' ₽';
    }

    function checkSubmitButton() {
        const licenseSelected = document.querySelector('input[name="license_id"]:checked');
        document.getElementById('submitBtn').disabled = !licenseSelected;
    }

    // Инициализация при загрузке страницы
    document.addEventListener('DOMContentLoaded', function() {
        // Добавляем обработчики для checkbox услуг
        document.querySelectorAll('input[name="services[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const card = this.closest('.checkout__license-card');
                if (this.checked) {
                    card.classList.add('selected');
                } else {
                    card.classList.remove('selected');
                }
                updateTotal();
            });
        });

        // Добавляем обработчики для radio лицензий
        document.querySelectorAll('input[name="license_id"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const card = this.closest('.checkout__license-card');
                const beatSection = card.closest('.checkout__section');
                beatSection.querySelectorAll('.checkout__license-card').forEach(c => c.classList.remove('selected'));
                card.classList.add('selected');
                
                const priceText = card.querySelector('.checkout__license-price').textContent;
                selectedLicensePrice = parseFloat(priceText.replace(/\s/g, '').replace('₽', '').trim());
                
                updateTotal();
                checkSubmitButton();
            });
        });
    });
</script>
@endsection