<template>
    <div>
    <div v-for="itm in datas" v-bind:key="itm.id">
        buaya{{itm.biaya}}
        id {{itm.id}}
       jumblah {{itm.jumlah}}
       kode {{itm.kode_status}}
       penerima {{itm.penerima}}
    </div>
    </div>

</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            datas:{
                id:''
            },
        }
    },
    mounted() {
        var t =this;
        axios.get('http://127.0.0.1:8000/api/cektraksansi?key=4FD6B4CC-9951-42B6-AD70-6B3B1433F394')
        .then(function(resp) {
            t.datas=resp.data.transaksi;
        
            console.log(resp.data.transaksi);
        }).catch(function (err) {
            t.datas=err.response;
        })
    },
}
</script>