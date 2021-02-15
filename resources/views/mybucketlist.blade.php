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
      <form action="addListItem" method="POST">
        @csrf
         <div class="input-group">
            <input class="form-control" name="listItem" id="listItem" placeholder="Before I Die I Want To..." type="text" required/>
            <span class="input-group-btn">
              <button type="submit" class="btn btn-info">Add</button>
            </span>
        </div>
      </form>
    </div>
</div>

{{-- Display --}}
<div class="user-content">
    <div class="shadow-box">
        @if(count($list) != 0)
        @foreach ($list as $w)
        {{-- Bucket List Item Display --}}
            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
            <label for="vehicle1">{{ $w->getDescription() }}</label><br>
        @endforeach
        @else
            <label for="listitem">Your bucket list is empty!</label><br>
        @endif
    </div>
</div>

@endsection
