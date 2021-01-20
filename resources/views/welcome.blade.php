@extends('layouts.main')

@section('content')
    

    @if ('successMsg')
    <div class="alert alert-success" role="alert" data-mdb-color="success">
        {{ session('successMsg') }}
    </div>
    @endif
    <div class="container text-center border border-light p-5" >
        <p class="h4 mb-4"> Student List</p>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th scope="col">Sl No.</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        
                        
                        <a href="{{ route('edit', $student->id) }}" class="btn btn-raised btn-primary btn-sm"> 
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>

                        <form method="post" id="delete-form-{{  $student->id }}" action="{{ route('delete', $student->id) }}" style="display: none">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                        </form>
                        <button onclick="
                        if(confirm('Are you sure you want to detele this record?')) 
                        {
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $student->id }}').submit();
                        }
                        else
                        {
                            event.preventDefault();
                        }
                        " class="btn btn-raised btn-danger btn-sm">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        {{--              <a href="" >  {{ route('update', $student->id) }} </a>--}}
           
                   </td>
                </tr>
                @endforeach
           
            </tbody>
        </table>

        {{ $students->links() }}
    </div>

@endsection