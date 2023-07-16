<h2 style="font-weight: bolder">Hai, {{ Auth::user()->name }}</h2>

<h5>Ajukan Bebas Pustaka</h5>

<form class="mt-4" action="{{ url('pustakawan/pengajuan/store') }}" method="post"> @csrf @method("POST")
    <input type="hidden" name="biodatapustakawans_id" value="{{ $biodata->id }}">
    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
    <button type="submit" class="btn btn-success btn-lg">Ajukan</button>
</form>