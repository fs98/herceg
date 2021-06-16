@extends('admin.layouts.main')

@section('content')
  
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">{{ __('Poruke') }}</h1> 

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb"> 
      <li class="breadcrumb-item active" aria-current="page">{{ __('Poruke') }}</li>
    </ol>
  </nav>

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-success align-middle">{{ __('Sve poruke') }}</h6>
    </div>
    <div class="card-body">
        <div class="row">

          @if ($questions->isNotEmpty())

            <div class="table-responsive"> 
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Ime</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Poruka</th>
                    <th>Poslana</th>
                    <th>Akcije</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($questions as $question)
                  <tr>
                    <td>{{ $question->name . ' ' . $question->surname }}</td>
                    <td>{{ $question->email }}</td>
                    <td>{{ $question->phone }}</td>
                    <td>{{ $question->message }}</td>
                    <td>{{ $question->created_at }}</td>
                    <td class="text-center table-column-controls">
                      <form action="{{ Route('admin.question.destroy', $question) }}" method="POST" class="d-inline-block">
                        @csrf
                        <button class="btn btn-danger pointer" type="button" onclick="deleteSingleItem(this)">
                          <span>Izbriši</span>
                        </button>
                        @method('delete')
                      </form> 
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Ime</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Poruka</th>
                    <th>Kreirana</th>
                    <th>Akcije</th>
                  </tr>
                </tfoot>
              </table>
            </div>

          @else

            <div class="col-12">
              <div class="alert alert-danger w-100" role="alert">
                U bazi podataka trenutno nemate ni jednog pitanja.
              </div>
            </div>

          @endif

        </div>
    </div> 
  </div>  

@endsection

@section('scripts')
    
    {{-- Delete --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
  function deleteSingleItem(test) {
    var form = $(test).parent();

    if(form[0] == undefined) {
      throw new Error;
    }

    var form_data = new FormData(form[0]);

    Swal.fire({
      icon: 'warning',
      text: 'Ove podatke nećete moći vratiti.',
      title: 'Jeste li sigurni?',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#1cc88a',
      confirmButtonText: 'Da, izbriši!',
      cancelButtonText : 'Odustani',
      allowEscapeKey : false,
      allowOutsideClick: false
    }).then((result) => {
      if(result.dismiss === Swal.DismissReason.cancel) {
          return false;
          throw new Error;
      } else {
        Swal.fire({
          toast: false,
          title: 'Obrada..',
          text: 'Molimo sačekajte..',
          allowEscapeKey : false,
          allowOutsideClick: false,
          onOpen: function() {
            $.ajax({
              type: $(form).attr('method'),
              url: $(form).attr('action'),
              processData: false,
              contentType: false,
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              data: form_data,
            }).done(function(data) {
            }).fail(function(data) {
            }).always(function(data) {
              console.log(data);
              
              if(data != undefined) {
                if(data.responseJSON != undefined && (data.responseJSON.errors != undefined || data.responseJSON.exception != undefined)) {
                  Swal.update({
                    allowEscapeKey : false,
                    allowOutsideClick: false,
                    icon: 'error',
                    text: 'Dogodila se greška! Molimo kontaktirajte podršku.',
                    title: 'Greška!',
                  });
                  Swal.hideLoading();
                  throw new Error;
                } else {
                  Swal.fire({
                    icon: data.swal_icon,
                    text: data.swal_message,
                    title: data.swal_title,
                    allowEscapeKey : false,
                    allowOutsideClick: false,
                  }).then(function() {
                    if(data.redirect_url != null && data.redirect_url != '') {
                      window.location.href = data.redirect_url;
                    }
                  });
                  Swal.hideLoading();
                }
              }
            });
            Swal.showLoading();
          }
        });
      }
    });
  }
</script>

@endsection