console.log("Esto funciona!");

function search() {
    let store = document.getElementById("searchName").value
    axios.get('{{ route('
            stores.search ')}}', {
                params: {
                    searchName: store,
                }
            })
        .then(function (res) {
            if (res.status == 200) {

            } else {
                console.log("Fallo!");
            }
        });

}

function createCardStore(store) {

}

/**
 * 
<div class="col-md-12 col-lg-6">
                          <div class="card">
                            @if($store->avatar)
                            <img src="{{ Storage::url($store->avatar)}}"  alt="" class="card-image">
                            @else
                            <img src="https://via.placeholder.com/150" alt="" class="card-image">
                            @endif

                              <div class="card-description">
                                  <h3>{{ $store->name}}</h3>
                                  <p><span><i class="fas fa-map-marker-alt"></i></span>{{ $store->address}}</p>
                                  @if ($store->rating != 0)
                                        @for ($i = 1; $i <= $store->rating; $i++)
                                            <span class="fa fa-star checked"></span>
                                        @endfor

                                        @for ($i = 1; $i < 5/$store->rating; $i++)
                                            <span class="fa fa-star"></span>
                                        @endfor
                                  @else
                                    @for ($i = 1; $i <= 5; $i++)
                                            <span class="fa fa-star"></span>
                                    @endfor
                                  @endif
                              </div>
                              <div class="card-availability">
                                  <p><b>{{$store->gifts}}</b> para entregar</p>
                              </div>
                              <div class="card-btn">
                                  <a href="{{ route('stores.perfil', $store->id) }}" class="btn-principal">Ver productos</a>
                              </div>
                          </div>
                      </div>
 */
