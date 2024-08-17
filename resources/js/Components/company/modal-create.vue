<script>
import { reactive } from 'vue'

export default {
    props: {
        showModal: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            formData: reactive({
                name: '',
                code: '',
                alamat: '',
                npwp: '',
                bpjs: '',
                nama_bank: '',
                no_rekening: '',
                nama_akun: ''
            })
        }
    },
    methods: {
        // changecustomerName(e) {
        //     const msg = document.querySelector(".varyingcontentModal");
        //     const customerName = document.getElementById("customer-name");
        //     this.showModal = !this.showModal,
        //         msg.innerText = "New message to " + e;
        //     customerName.value = e;
        // },
        submitForm() {
            this.$emit('submit', this.formData)
            this.$emit('close')
        }
    },
};
</script>
<template>
    <BModal hide-footer title="New Company" title-class="varyingcontentModal" class="v-modal-custom">
        <form @submit.prevent="submitForm">
            <div class="mb-3">
                <label for="company-name" class="col-form-label">Name:</label>
                <input v-model="formData.name" type="text" class="form-control" id="company-name" required />
            </div>
            <div class="mb-3">
                <label for="company-code" class="col-form-label">Code:</label>
                <input v-model="formData.code" type="text" class="form-control" id="company-code" required />
            </div>
            <div class="mb-3">
                <label for="company-address" class="col-form-label">Address:</label>
                <textarea v-model="formData.alamat" class="form-control" id="company-address" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label for="npwpInput" class="form-label">NPWP</label>
                <input v-model="formData.npwp" type="text" class="form-control" id="npwpInput">
            </div>
            <div class="mb-3">
                <label for="bpjsInput" class="form-label">BPJS</label>
                <input v-model="formData.bpjs" type="text" class="form-control" id="bpjsInput" >
            </div>
            <div class="mb-3">
                <label for="bankInput" class="form-label">BANK</label>
                <input v-model="formData.nama_bank" type="text" class="form-control" id="bankInput" >
            </div>
            <div class="mb-3">
                <label for="rekeningInput" class="form-label">NO REKENING</label>
                <input v-model="formData.no_rekening" type="text" class="form-control" id="rekeningInput">
            </div>
            <div class="mb-3">
                <label for="akunInput" class="form-label">NAMA AKUN REKENING</label>
                <input v-model="formData.nama_akun" type="text" class="form-control" id="akunInput">
            </div>
            <div class="modal-footer v-modal-footer">
                <BButton type="button" variant="light" @click="modalShow = false">Back
                </BButton>
                <BButton type="submit" variant="primary">Submit</BButton>
            </div>
        </form>
    </BModal>
</template>
