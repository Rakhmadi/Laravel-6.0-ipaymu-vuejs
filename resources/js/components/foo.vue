<template>
    
        <v-card class="ma-4" :loading="isload">
            <v-card-title>Transaksi</v-card-title>
            <v-card-text>
                 <div v-for="itm in datas" v-bind:key="itm.id">
                
        buaya{{itm.biaya}}
        id {{itm.id}}
       jumblah {{itm.jumlah}}
       kode {{itm.kode_status}}
       penerima {{itm.penerima}}
    </div>
            </v-card-text>
           
        </v-card>
    
    

</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            datas:{
                id:'',
                
            },
            isload:false
        }
    },
    mounted() {
        
        var t =this;
        t.isload=true;
        axios.get('http://127.0.0.1:8000/api/cektraksansi?key=4FD6B4CC-9951-42B6-AD70-6B3B1433F394')
        .then(function(resp) {
            
            t.datas=resp.data.transaksi;
            t.isload=false
            console.log(resp.data.transaksi);

        }).catch(function (err) {
            t.datas=err.response;
            t.isload=true;
        })
    },
}
</script>