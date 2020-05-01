@section('gifts')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <form action="{{ route('otps.destroy', 'codigo') }}" method="POST">
                @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="text" name="codigo">
                    <button class="btn btn-link" type="submit">Entregar</button>

                </form>
      
            </div>
        </div>
    </div>
</div>
@endsection
