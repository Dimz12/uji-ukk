

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow" style="background-color:darkgrey ;">
                    <div class="card-body" >
                        <h4>EDIT POST</h4>
                        <hr>

                        <form @submit.prevent="update">
                            <div class="form-group">
                                <label for="nama" class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control" v-model="post.nama" placeholder="Masukkan Nama Lengkap Anda">
                                <!-- validation -->
                                <div v-if="validation.nama" class="mt-2 alert alert-danger">
                                    {{ validation.nama[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nik" class="font-weight-bold">Nik</label>
                                <input type="text" class="form-control" v-model="post.nik" placeholder="Masukkan NIK Anda">
                                <!-- validation -->
                                <div v-if="validation.nik" class="mt-2 alert alert-danger">
                                    {{ validation.nik[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="font-weight-bold">Tanggal</label>
                                <input type="text" class="form-control" v-model="post.tanggal" placeholder="Masukkan Tanggal Perjalanan ">
                                <!-- validation -->
                                <div v-if="validation.tanggal" class="mt-2 alert alert-danger">
                                    {{ validation.tanggal[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="waktu" class="font-weight-bold">Waktu</label>
                                <input type="text" class="form-control" v-model="post.waktu" placeholder="Masukkan Waktu Perjalanan ">
                                <!-- validation -->
                                <div v-if="validation.waktu" class="mt-2 alert alert-danger">
                                    {{ validation.waktu[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lokasi" class="font-weight-bold">LOKASI</label>
                                <input type="text" class="form-control" v-model="post.lokasi" placeholder="Masukkan Lokasi Tujuan Perjalanan Anda ">
                                <!-- validation -->
                                <div v-if="validation.lokasi" class="mt-2 alert alert-danger">
                                    {{ validation.lokasi[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="suhu_tubuh" class="font-weight-bold">Suhu Tubuh</label>
                                <input type="text" class="form-control" v-model="post.suhu_tubuh" placeholder="Masukkan Suhu Tubuh Anda  ">
                                <!-- validation -->
                                <div v-if="validation.suhu_tubuh" class="mt-2 alert alert-danger">
                                    {{ validation.suhu_tubuh[0] }}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import axios from 'axios'

export default {
            name: 'edit',
    setup() {

        //state posts
        const post = reactive({
            nama: '',
            nik:'',
            tanggal: '',
            waktu: '',
            lokasi: '',
            suhu: ''
        })

        //state validation
        const validation = ref([])

        //vue router
        const router = useRouter()

        //vue router
        const route = useRoute()

        //mounted
        onMounted(() => {

            //get API from Laravel Backend
            axios.get(`http://localhost:8000/api/posts/${route.params.id}`)
            .then(response => {
              
              //assign state posts with response data
              post.nama    = response.data.data.nama  
              post.nik  = response.data.data.nik  
              post.tanggal    = response.data.data.tanggal  
              post.waktu  = response.data.data.waktu  
              post.lokasi    = response.data.data.lokasi  
              post.suhu_tubuh  = response.data.data.suhu_tubuh

            }).catch(error => {
                console.log(error.response.data)
            })

        })

        //method update
        function update() {
            let nama   = post.nama
            let nik   = post.nik
            let tanggal   = post.tanggal
            let waktu = post.waktu
            let lokasi = post.lokasi
            let suhu_tubuh = post.suhu_tubuh

            axios.put(`http://localhost:8000/api/posts/${route.params.id}`, {
                nama: nama,
                nik:nik,
                tanggal: tanggal,
                waktu: waktu,
                lokasi:lokasi,
                suhu_tubuh:suhu_tubuh
            }).then(() => {

                //redirect ke post index
                router.push({
                    name: 'post.index'
                })

            }).catch(error => {
                //assign state validation with error 
                validation.value = error.response.data
            })

        }

        //return
        return {
            post,
            validation,
            router,
            update
        }

    }

}
</script>

<style>
    body{
        background: lightgray;
    }
</style>