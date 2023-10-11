@extends('layout.layout')
@extends('layout.nav')
@section('content')

@if(session('success'))
    <div class="mt-5 bg-success p-4">
        <span class="font-medium text-light">{{ session('success') }}</span>
    </div>
@endif
<div class="container">
  <table class="table align-middle mb-0 bg-white mt-5">
    <thead class="bg-light">
      <tr>
        <th>Nom</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="search-result">
      @foreach($stagiaires as $stagiaire)
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img
                src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                alt=""
                style="width: 45px; height: 45px"
                class="rounded-circle"
                />
            <div class="ms-3">
              <p class="fw-bold mb-1">{{$stagiaire->name}}</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">{{$stagiaire->email}}</p>
        </td>
        
        <td>
          <button type="button" class="btn btn-primary">
             <a href="{{ route('stagiaires.edit', ['id' => $stagiaire->id]) }}" class="text-light text-decoration-none">Edit</a>
          </button>
          <button type="button" class="btn btn-danger show-modal-button" data-id-stagiaire="{{$stagiaire->id}}">
              Supprimer
          </button>
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>
<div id="pagination-links" class="mt-5 d-flex justify-content-center">
  {{$stagiaires->links()}}
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="module">
$(document).ready(function () {
    $('#search-input').on('keyup', function () {
        var searchInput = $('#search-input').val();
        console.log(searchInput);

        $.ajax({
            type: 'POST',
            url: '{{ route('search') }}',
            data: {
                search: searchInput,
                _token: '{{ csrf_token() }}',
            },
            success: function (response) {
                $('#search-result').empty(); 
                console.log(response.data);
                response.data.forEach(function (stagiaire) {
                    var stagiaireId = stagiaire.id;

                    var editLinkHref = editLink(stagiaireId); 

                    var rowHtml = `
                        <tr>
                            <td>${stagiaire.name}</td>
                            <td>${stagiaire.email}</td>
                            <td>
                                <a href="${editLinkHref}" class="btn btn-success">Editer</a>
                                <button type="button" class="btn btn-danger">Supprimer</button>
                            </td>
                        </tr>
                    `;
                    $('#search-result').append(rowHtml); 
                });
                $('#pagination-links').html(response.links);


            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', error);
            }
        });
    });
});

function editLink(stagiaireId) {
  return `{{ route('stagiaires.edit', ['id' => ':value']) }}`.replace(':value', stagiaireId);
}

</script>









@endsection