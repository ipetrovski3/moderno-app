@extends('layouts.navbar')

@section('content')
<div class="container mt-4">

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Во Кошничка</span>
        <span class="badge badge-secondary badge-pill">{{ Cart::count() }}</span>
      </h4>
      <ul class="list-group mb-3">
        @foreach ($cart_items as $item )
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h5 class="my-0">{{ $item->name }}</h6>
              <p>
                <small class="text-muted">Количина: {{ $item->qty }}</small>
              </p>
              <p>
                <small class="text-muted">Големина: XL</small>
              </p>
            </div>
            <span class="text-muted">Износ: {{ $item->price }}</span>
          </li>          
        @endforeach
        <li class="list-group-item d-flex justify-content-between">
          <span>Вкупно (MKD)</span>
          <strong>{{ Cart::total() }}</strong>
        </li>
      </ul>
    </div>

    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Податоци за нарачката</h4>
      <form class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Име</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Презиме</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="phone"> Телефон </label>
          <input type="phone" class="form-control" id="phone" placeholder="you@example.com">
        </div>       
        
        <div class="mb-3">
          <label for="email">Емаил адреса </label>
          <input type="email" class="form-control" id="email" placeholder="+3897">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Адреса за испорака</label>
          <input type="text" class="form-control" id="address" placeholder="Ул. Македонија бр. 33" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="town">Град</label>
            <select class="custom-select d-block w-100" id="town" required>
              <option value="">Изберете</option>
              <option>Скопје</option>
              <option>Берово</option>
              <option>Битола</option>
              <option>Богданци</option>
              <option>Валандово</option>
              <option>Велес</option>
              <option>Виница</option>
              <option>Гевгелија</option>
              <option>Гостивар</option>
              <option>Дебар</option>
              <option>Делчево</option>
              <option>Демир Капија</option>
              <option>Кавадарци</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>

          <div class="col-md-3 mb-3">
            <label for="zip">Поштенски број</label>
            <input type="text" class="form-control" id="zip" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Плаќање</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">На Врата</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" disabled>
            <label class="custom-control-label" for="debit">Картичка <small>(Моментално оваа услуга е недостапна)</small></label>
          </div>

        </div>
        {{-- <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div>
        <hr class="mb-4">
      </div> --}}
      <button class="btn btn-primary btn-lg btn-block" type="submit">Потврди ја нарачката</button>
    </form>
  </div>
</div>
<div class="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script></script>
@endsection