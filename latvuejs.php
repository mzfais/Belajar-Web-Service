<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan Vue JS</title>
</head>

<body>
    <div id="msg">
        {{ nama }} - {{ umur }} <br>
        {{ laki? 'laki - laki': 'perempuan' }} <br>
        b: {{ b }}
        <span v-html="raw"></span>
        <h4>Daftar Member</h4>
        <ul>
            <li v-for="member in members">
                {{ member.name }} - {{ member.age }}
            </li>
        </ul>
        <button v-on:click="ubahnama('faisol elek')">Ubah Nama</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script>
        var vo = new Vue({
            el: '#msg',
            data: {
                nama: 'faisol',
                umur: 30,
                raw: '<p>belajar <b>vuejs</b></p>',
                laki: true,
                members: [{
                        name: "faisol",
                        age: 34
                    },
                    {
                        name: "erna",
                        age: 30
                    },
                    {
                        name: "aby",
                        age: 7
                    },
                    {
                        name: "abir",
                        age: 2
                    }
                ]
            },
            computed: {
                b: function() {
                    return this.umur + 2;
                }
            },
            methods: {
                ubahnama: function(s) {
                    this.nama = s;
                }
            }
        });
    </script>
</body>

</html>