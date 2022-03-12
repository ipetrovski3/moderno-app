
  @foreach ($products as $product)
      <tr>
          <th scope="row">{{ $product->id }}</th>
          <td>{{ $product->category->name }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->stock }}</td>
          <td>{{ number_format($product->price, 2, ',', '.') }} ден</td>
          <td>{{ number_format($product->cost_price, 2, ',', '.') }} ден</td>
          <td><a href="{{ route('edit.product', $product->id) }}" class="btn btn-secondary"><i class="fas fa-edit"></i></a> </td>
          <td><button class="btn btn-warning img-open"
                  data-image="{{ asset('storage/products' . '/' . $product->image) }}" data-product="{{ $product->name }}"><i
                      class="fas fa-eye"></i></button></td>
          <td>
              <input class="toggle" type="checkbox" {{ $product->active ? 'checked' : '' }}
                  data-toggle="toggle" data-on="ДА" data-off="НЕ" data-onstyle="success" data-offstyle="danger"
                  data-id="{{ $product->id }}">
          </td>
          <td>
              <select class="form-control" name="option" id="">
                  <option value=""></option>
                  @foreach ( $product->options as $key => $option)
                  <option {{ $key == $product->option ? 'selected' : '' }} value="{{ $key }}">{{ $option }}</option>
                  @endforeach
              </select>
          </td>
      </tr>
  @endforeach

