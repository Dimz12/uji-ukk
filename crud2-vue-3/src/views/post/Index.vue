<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow" style="background-color:darkgrey ;">
                    <div class="card-body">
                        <h4 style="color:;">DATA CATATAN PERJALANAN</h4>
                        <hr>
                        <router-link :to="{name: 'post.create'}" class="btn btn-md btn-success" style="color: ghostwhite;">TAMBAH+</router-link>

                        <table class="table table-striped table-bordered mt-4">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">TANGGAL</th>
                                    <th scope="col">WAKTU</th>
                                    <th scope="col">LOKASI</th>
                                    <th scope="col">SUHU TUBUH</th>
                                    <th scope="col">OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(post, index) in posts" :key="index">
                                    <td>{{ post.nama }}</td>
                                    <td>{{ post.nik }}</td>
                                    <td>{{ post.tanggal }}</td>
                                    <td>{{ post.waktu }}</td>
                                    <td>{{ post.lokasi }}</td>
                                    <td>{{ post.suhu_tubuh }}</td>
                                    <td class="text-center">
                                        <router-link :to="{name: 'post.edit', params:{id: post.id }}" class="btn btn-sm btn-primary mr-1">EDIT</router-link>
                                        <button @click.prevent="postDelete(post.id)" class="btn btn-sm btn-danger ml-1">DELETE</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { onMounted, ref } from 'vue'

export default {

    name: 'index',
    setup() {

        //reactive state
        let posts = ref([])

        //mounted
        onMounted(() => {

            //get API from Laravel Backend
            axios.get('http://localhost:8000/api/posts')
            .then(response => {
              
              //assign state posts with response data
              posts.value = response.data.data

            }).catch(error => {
                console.log(error.response.data)
            })

        })

        //method delete
function postDelete(id) {
            
            //delete data post by ID
            axios.delete(`http://localhost:8000/api/posts/${id}`)
            .then(() => {
                       
                //splice posts 
                posts.value.splice(posts.value.indexOf(id), 1);
         
             }).catch(error => {
                 console.log(error.response.data)
             })
         
         }

        //return
        return {
            posts,
            postDelete 

        }

    }

}
</script>

<style>
    body{
        background: lightgray;
    }
</style>