@extends ('layouts.app')
@section ('content')
<div class="container">
    <h2>Lista de proveedores registrados <a href="proveedor/create"><button type="button" class="btn btn-success float-right">Agregar Proveedor</button></a></h2>
    <h6>
      @if($search ?? '')
        <div class="alert alert-primary" role="alert">
            Los resultados de tu busqueda '{{ $search ?? '' }}' son:
        </div>
      @endif
    </h6>	
<table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">Nombre Empresa</th>
        <th scope="col">Ruc</th>
        <th scope="col">Direccion</th>
        <th scope="col">Telefono</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
<tbody>
      @foreach($proveedor as $pro)
      <tr>
        <th>{{$pro->idProveedor}}</th>
        <td>{{$pro->nombreEmpresa}}</td>
        <td>{{$pro->ruc}}</td>
        <td>{{$pro->direccion}}</td>
        <td>{{$pro->telefono}}</td>
        <td>{{$pro->email}}</td>
        <td>
          <form action="{{route('proveedor.destroy', $pro->idProveedor)}}" method="post">
              <a href="{{route('proveedor.show', $pro->idProveedor)}}"><button type="button" class="btn btn-secondary">Ver</button></a>
              <a href="{{ route('proveedor.edit', $pro->idProveedor) }}"><button type="button" class="btn btn-primary">Editar</button></a>
            @csrf
            @method('DELETE')
              <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </td>
      </tr>

      @endforeach
    </tbody>
  </table>


@endsection