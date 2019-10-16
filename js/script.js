function showAll() {
    $.getJSON('./mhs.json', function (data) {
        let mhs = data.mahasiswa;
        let content = '';
        $.each(mhs, function (i, data) {
            content += '<div class="col-md-4 mb-3"><div class="card"><img src="' + data.foto + '" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">' + data.nama + '</h5> <p class="card-text">Mahasiwa dengan NIM ' + data.nim + ' ini berasal dari ' + data.alamat_asal + '.</p><a onclick="tampil(' + data.nim + ');" class="btn btn-primary">Lihat Profil</a></div></div></div>';

        });
        $('#list-profile').html(content);
    })
}

showAll();

$('.nav-link').on('click', function () {
    $('.nav-link').removeClass('active');
    $(this).addClass('active');
    let link = $(this).html();
    if (link == 'Home') {
        showAll();
        $('h1').html('Profil Mahasiswa');
        return;
    }
    $('h1').html('Profil Mahasiswa ' + link);

    $.getJSON('./mhs.json', function (data) {
        let mhs = data.mahasiswa;
        let content = '';
        $.each(mhs, function (i, data) {
            if (data.jk == link) {
                content += '<div class="col-md-4 mb-3"><div class="card"><img src="' + data.foto + '" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">' + data.nama + '</h5> <p class="card-text">Mahasiwa dengan NIM ' + data.nim + ' ini berasal dari ' + data.alamat_asal + '.</p><a href="#" class="btn btn-primary">Lihat Profil</a></div></div></div>';
            }

        });
        $('#list-profile').html(content);
    })
});

tampil(nim) {

}