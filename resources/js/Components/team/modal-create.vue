<script>
export default {
    props:{
        showModal: {
            type: Boolean,
            default: false
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
    },
};
</script>
<template>
    <BModal hide-footer title="New team"
        title-class="varyingcontentModal" class="v-modal-custom">
        <form>
            <div class="mb-3">
                <label for="customer-name" class="col-form-label">Team
                    Name:</label>
                <input type="text" class="form-control" id="customer-name" />
            </div>
            <div class="mb-3">
                <label for="customer-name" class="col-form-label">Team
                    Alias:</label>
                <input type="text" class="form-control" id="customer-name" />
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Description:</label>
                <textarea class="form-control" id="message-text" rows="4"></textarea>
            </div>
        </form>
        <div class="modal-footer v-modal-footer">
            <BButton type="button" variant="light" @click="modalShow = false">Back
            </BButton>
            <BButton type="button" variant="primary">Save Changes</BButton>
        </div>
    </BModal>
</template>
