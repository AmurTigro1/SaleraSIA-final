@extends('home')

@section('content')

@if (session('info'))
    <div class="alert alert-success">{{ session('info') }}</div>
@endif

<div class='d-grip gap-2 d-md-flex justify-content-between mb-3'>
    <div class="text-md-end">
        <a href="#" class='btn btn-green mo-md-2 import-csv-btn' type='button'>
            Import CSV
        </a>
      <form action="{{ route('plants.import-csv') }}" method="POST" enctype="multipart/form-data" style="display: none;"> 
    @csrf
    <input type="file" name="csv_file" id="csv_file" accept=".csv" style="display: none;">
    <button type="submit" class="btn btn-green1 mo-md-2">Submit</button>
</form>

        
        <a href="{{ url('/plants/csv-all') }}" class='btn btn-green mo-md-2' type='button'>
            Generate CSV
        </a>
        <a href="{{ url('/plants/pdf') }}" class='btn btn-green mo-md-2' type='button'>
            Generate PDF
        </a>
    </div>
</div>
<div class="row">
    @if(isset($plants))
        @foreach($plants as $plant)
            <div class="col-md-6 mb-4">
                <div class="card position-relative">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <div class="card-body">
                                <div class="m-2">
                                    <img src="{{$plant->imageUrl}}" alt="plant Image" class="w-full rounded" style="height: 160px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mt-[2%]">{{ $plant->name}}</h5>
                                <p class="card-text">Price: {{ $plant->price }}</p>
                            </div>
                            <div class=" bottom-0 qr m-2">
                                    {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(50)->generate($plant->imageUrl) !!}
                        </div>
                        </div>
                    </div>
                </div>
                
            </div>
        @endforeach
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var importCsvBtn = document.querySelector('.import-csv-btn');
        var fileInput = document.querySelector('#csv_file');

        importCsvBtn.addEventListener('click', function(event) {
            event.preventDefault();
            fileInput.click();
        });

        fileInput.addEventListener('change', function() {
            this.parentElement.submit();
        });
    });
</script>

@endsection

<style scoped>
    .qr{
        margin-left: 20px
    }
</style>
