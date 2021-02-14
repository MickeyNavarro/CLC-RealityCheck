@extends('layouts.appmaster')
@section('title', 'Explore Page')

@section('content')
<div class="explore-header">
<h1>Explore Page</h1>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-desc">
                        <h3>@JohnSmith's Bucket List</h3>
                        {{-- Temporary Bucket List Item Display --}}
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked onclick="return false;">
                        <label for="vehicle1">Go Camping</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" onclick="return false;">
                        <label for="vehicle1">Sleep under the stars</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" onclick="return false;">
                        <label for="vehicle1">Go to Japan</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked onclick="return false;">
                        <label for="vehicle1">Learn ASL</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" onclick="return false;">
                        <label for="vehicle1">Meet my favorite celebrity</label><br>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-desc">
                        <h3>@JustinBieber's Bucket List</h3>
                        {{-- Temporary Bucket List Item Display --}}
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" onclick="return false;">
                        <label for="vehicle1">Go ghost hunting</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" onclick="return false;">
                        <label for="vehicle1">Learn to ride a motorcycle</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked onclick="return false;">
                        <label for="vehicle1">Have a picnic at Central Park, NY</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" onclick="return false;">
                        <label for="vehicle1">Cross intersection at Abbey Road</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" onclick="return false;">
                        <label for="vehicle1">Ride a camel</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" onclick="return false;">
                        <label for="vehicle1">Go skydiving</label><br>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-desc">
                        <h3>@MileyCyrus's Bucket List</h3>
                        {{-- Temporary Bucket List Item Display --}}
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked onclick="return false;">
                        <label for="vehicle1">Swim with dolphins</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" onclick="return false;">
                        <label for="vehicle1">Go to Paris</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" onclick="return false;">
                        <label for="vehicle1">Fly in a hot air balloon</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked onclick="return false;">
                        <label for="vehicle1">Visit every Disney Park<label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked onclick="return false;">
                        <label for="vehicle1">Go to Hawaii</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked onclick="return false;">
                        <label for="vehicle1">Learn to play guitar</label><br>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-desc">
                        <h3>@TaylorSwift's Bucket List</h3>
                        {{-- Temporary Bucket List Item Display --}}
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" onclick="return false;">
                        <label for="vehicle1">Go ghost hunting</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked onclick="return false;">
                        <label for="vehicle1">Learn to ride a motorcycle</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" onclick="return false;">
                        <label for="vehicle1">Have a picnic at Central Park, NY</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked onclick="return false;">
                        <label for="vehicle1">Cross intersection at Abbey Road</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" onclick="return false;">
                        <label for="vehicle1">Ride a camel</label><br>

                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" onclick="return false;">
                        <label for="vehicle1">Go skydiving</label><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
