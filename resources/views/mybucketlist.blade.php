@extends('layouts.appmaster')
@section('title', 'My Bucket List')
@section('content')

{{-- Header --}}
<div class="bucketlist-header">
<h1>&#x40;{{session()->get('username')}}'s Bucket List</h1>
</div>

{{-- Add Item --}}
<div class="input-bar">
    <div class="input-bar-item">
      <form action="" method="POST">
         <div class="input-group">
            <input class="form-control" placeholder="Before I Die I Want To..." type="text"/>
            <span class="input-group-btn">
              <button class="btn btn-info">Add</button>
            </span>
        </div>
      </form>
    </div>
</div>

{{-- Display --}}
<div class="user-content">
    <div class="shadow-box">
        {{-- Temporary Bucket List Item Display --}}
        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
        <label for="vehicle1">See the Northern Lights</label><br>

        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
        <label for="vehicle1">Travel To Thailand</label><br>

        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
        <label for="vehicle1">Go Bungee Jumping</label><br>

        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
        <label for="vehicle1">Read 50 Books</label><br>
    </div>
</div>

@endsection
