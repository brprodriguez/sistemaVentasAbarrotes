@extends('template')

@section('title','Categorias')

@push('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
@endpush

@section('content')
@if(session('success'))
<script>
    const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
    });
    Toast.fire({
    icon: "success",
    title: "Operacion Exitosa"
    });
</script>
@endif
<div class="container-fluid px-4">
                        <h1 class="mt-4 text-center">Categorias</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ route('panel')}}"> Inicio</a></li>
                            <li class="breadcrumb-item active">Categorias</li>
                        </ol>

    <div class="mb-4">
    <a href="{{route('categorias.create')}}"> <button type="button" class="btn btn-primary"> Añadir nuevo registro</button> </a>
    </div>

    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tablas Categorias
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        @foreach ($categorias as $categoria)
                                        <tr>
                                            <td>{{$categoria->caracteristica->nombre }}</td>
                                            <td>{{$categoria->caracteristica->descripcion }}</td>
                                            <td> 
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                         <form action="{{route('categorias.edit',['categoria'=>$categoria])}}" method='GET'>
                                            
                                                <button type="submit" class="btn btn-warning">Editar</button>
                                         </form>
                                            
                                                <button type="button" class="btn btn-danger">Eliminar</button>
                                                </div>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
@endpush