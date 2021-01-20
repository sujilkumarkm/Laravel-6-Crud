@extends('layouts.main')

@section('content')
<div class="container">
    <br>
    @if ($errors->any)
    @foreach ($errors->all() as $error )
    <div class="alert alert-danger" role="alert" data-mdb-color="danger">
        {{ $error }}
    </div>
    @endforeach
        
    @endif
   
    <form class="text-center border border-light p-5" action="{{ route('update',$student->id) }}" method="post">
        {{ csrf_field() }}
        <p class="h4 mb-4"> Edit Student </p>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input type="text" name="first_name" id="form3Example1" class="form-control" placeholder="First name" value="{{ $student->first_name }}" />
              <label class="form-label" for="form3Example1">First name</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input type="text" name="last_name" id="form3Example2" class="form-control" placeholder="Last name"  value="{{ $student->last_name }}" />
              <label class="form-label" for="form3Example2">Last name</label>
            </div>
          </div>
        </div>
      
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" name="email" id="form3Example3" class="form-control" placeholder="Email address"
            value="{{ $student->email }}" />
            <label class="form-label" for="form3Example3">Email address</label>
          </div>  <!-- Phone input -->
          <div class="form-outline mb-4">
            <input type="text" name="phone" id="form3Example3" class="form-control" placeholder="Phone Number" 
            value="{{ $student->phone }}" />
            <label class="form-label" for="form3Example3" >Phone Number</label>
          </div>    
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
      
        <!-- Register buttons -->
      </form>
</div>
@endsection