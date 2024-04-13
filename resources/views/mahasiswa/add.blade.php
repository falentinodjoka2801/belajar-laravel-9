<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Mahasiswa</title>
    
    <script src='{{asset("admin-lte/plugins/jquery/jquery.min.js")}}'></script>
    <script src='{{asset("custom/js/custom-select-box.js")}}'></script>
    <script src='{{asset("custom/js/form-submission.js")}}'></script>
</head>
<body>
    <form action="{{route('mahasiswa.save')}}" method='post' enctype="multipart/form-data"
        id='formMahasiswa'>
        @csrf
        <label for="nama">Nama Mahasiswa</label>
        <input type="text" name='nama' id='nama' placeholder='Nama Lengkap Mahasiswa'
            required />
        <br />
        <label for="alamat">Alamat Mahasiswa</label>
        <textarea name='alamat' id='alamat'
            placeholder='Alamat Lengkap Mahasiswa' required></textarea>
        <br />
        <label for="prodi">Program Study</label>
        <select name='prodi' id='prodi' class='hirarki' required
            data-tingkat='1'>
            <option value="">-- Pilih Program Study --</option>
            @foreach($listProgramStudy as $programStudy)
                <option value="{{$programStudy->prodiKode}}">{{$programStudy->prodiNamaResmi}}</option>
            @endforeach
        </select>
        <br />
        <label for="konsentrasi">Konsentrasi</label>
        <select name='konsentrasi' id='konsentrasi' class='hirarki' required
            data-tingkat='2'
            data-default-text='Pilih Konsentrasi'
            data-url='{{url("ajax/konsentrasi-prodi")}}'
            data-data-src='listKonsentrasiProdi'
            data-option-value-src='id'
            data-option-text-src='nama'>
            <option value="">-- Pilih Konsentrasi --</option>
        </select>
        <hr />
        <button type="submit">Submit</button>
    </form>
</body>
<script language='Javascript'>
    let _formMahasiswa  =   $('#formMahasiswa');

    $('.hirarki').on('change', async function(){
        await hirarki(this);
    });
</script>
</html>