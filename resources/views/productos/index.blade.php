@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Productos <a href="productos/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('productos.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12">
		<div class="table-responsibe">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Opciones</th>
				</thead>
				@foreach ($productos as $pro)
				<tr>
					<td>{{ $pro->id }}</td>
					<td>{{ $pro->nombre }}</td>
					<td>
                        <a href="{{URL::action('ProductosController@edit',$art->idarticulo)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
                </tr>
                @include('productos.modal')
				@endforeach
			</table>
		</div>
		{{$productos->render()}}
	</div>
</div>
@endsection
