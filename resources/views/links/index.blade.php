@extends('layouts.app')

@section('content')

<!--Generate New Link-->
       <div class="container">
              <div class="card">
                <div class="card-body">

                  <form class="row g-3" action="{{route('generate.store')}}" method="POST">
                    @csrf
                  <div class="d-flex flex-row align-items-center">
                    <input type="text" name="link" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Add new...">
                    <div>
                      <button type="submit"style="margin-left:16px" class="btn btn-primary btn-lg">
                        Generate
                      </button>
                    </div>
                  </div>
                  </form>

                </div>
              </div>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Link</th>
                    <th scope="col">Shorten</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($shortenLinks as $link)
                    <tr>
                     <td><a href="{{$link->link}}" id="slink" target="_blank">{{$link->link}}</a></td>
                     <td><a href="{{asset($link->shortlink)}}">{{asset($link->shortlink)}}</a></td>
                     <td><button class="btn btn-outline-secondary cbtn">Copy</button></td>
                    </tr>
                    @endforeach

                </tbody>

            </div>
<script>

var cbtn = document.getElementsByClassName('cbtn');

for (var i = 0; i < cbtn.length; i++) {
    cbtn[i].addEventListener('click', function() {

    var pbtn = this.parentNode.parentNode.cells[1].textContent;
    copyToClipboard(pbtn);
  });
}
function copyToClipboard(text) {
  var data = document.createElement("textarea");
  document.body.appendChild(data);
  data.value = text;
  data.select();
  document.execCommand("copy");
  document.body.removeChild(data);
}

</script>

@endsection
