<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="data-msg">
        <button v-on:click="ambildata">Ambil Data</button>
        <table>
            <tr v-for="mhs in listmhs">
                <td>{{ mhs.nim }}</td>
                <td>{{ mhs.nama_mhs }}</td>
                <td>{{ mhs.alamat_mhs }}</td>
            </tr>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var list = new Vue({
            el: "#data-msg",
            data: {
                listmhs: []
            },
            mounted() {
                // menggunakan axios
                axios.get('http://localhost/rest-server/index.php/mahasiswa?token=12345')
                    .then(response => this.listmhs = response.data.data)
                    .catch(err => console.log(err));
                /*                 
                // menggunakan vue-resource
                this.$http.get('http://localhost/rest-server/index.php/mahasiswa?token=12345').then(response => {
                                    this.listmhs = response.data.data;
                                    //return response.data.data;
                                    console.log(response.data.data);
                                    // success callback
                                }, response => {
                                    console.log(response.statusText);
                                    // error callback
                                });
                 */
            },
            methods: {
                ambildata: function() {
                    this.$http.get('http://localhost/rest-server/index.php/mahasiswa?token=12345').then(response => {
                        this.listmhs = response.data.data;
                        //return response.data.data;
                        console.log(response.data.data);
                        // success callback
                    }, response => {
                        console.log(response.statusText);
                        // error callback
                    });

                }
            }
        });
    </script>

</body>

</html>