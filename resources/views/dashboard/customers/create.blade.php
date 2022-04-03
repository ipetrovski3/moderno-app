@extends('adminlte::page')

@section('content')
    <form class="needs-validation" action="{{ route('customer.store') }}" method="POST" novalidate>
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName">Име *</label>
                <input type="text" name="first_name" class="form-control" id="firstName" required>
                @error('first_name')
                <div> <span class="text-danger"> {{ $message }} </span></div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName">Презиме *</label>
                <input type="text" name="last_name" class="form-control" id="lastName" required>
                @error('last_name')
                <div> <span class="text-danger"> {{ $message }} </span></div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email">Емаил *</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="">
                @error('email')
                <div> <span class="text-danger"> {{ $message }} </span></div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone">Телефон *</label>
                <input type="number" name="phone" class="form-control" id="email" placeholder="">
                @error('phone')
                <div> <span class="text-danger"> {{ $message }} </span></div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="address">Адреса *</label>
            <input type="text" name="address" class="form-control" id="address" placeholder=""
                   required>
            @error('address')
            <div> <span class="text-danger"> {{ $message }} </span></div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="country">Град *</label>
                <select class="wide w-100" name="town" id="country">
                    <option value="">Изберете</option>
                    @foreach (Helpers::towns() as $town)
                        <option value="{{ $town }}">{{ $town }}</option>
                    @endforeach
                </select>
                @error('town')
                <div> <span class="text-danger"> {{ $message }} </span></div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-app">Креирај
        </button>
    </form>
@endsection

@section('js')
    @if(Session::has('success'))
        <script>
            Swal.fire({
                html: "{{Session::get('success')}}",
                confirmButtonColor: '#b0b435'
            })
        </script>
    @endif
@endsection
