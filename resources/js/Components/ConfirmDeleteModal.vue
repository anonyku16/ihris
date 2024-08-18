<script setup>
import { ref, watch } from 'vue';
import Lottie from "@/Components/widgets/lottie.vue";

const emit = defineEmits(['delete','close']);
const props = defineProps({
    showModal: {
        type: Boolean,
        default: false,
    },
    modalInfo: String,
    modalMessage: String
});

import animationData from "@/Components/widgets/gsqxdxog.json";

const lottieFile = ref({animationData: animationData});

const modalVisible = ref(props.showModal);

watch(() => props.showModal, (newVal) => {
    modalVisible.value = newVal;
});

const closeModal = () => {
    emit('close');
};

const confirmDelete = () => {
    emit('delete');
}

</script>
<template>
    <BModal hide-footer class="v-modal-custom" hide-header-close centered no-close-on-backdrop>
        <div class="modal-body text-center">
            <lottie colors="primary:#121331,secondary:#08a88a" trigger="loop" :options="lottieFile" :height="120"
                :width="120" />
            <div class="mt-4">
                <h4 class="mb-3">{{ modalInfo }}</h4>
                <p class="text-muted mb-4">{{ modalMessage }}</p>
                <div class="hstack gap-2 justify-content-center">
                    <BLink @click="closeModal" class="btn btn-success">
                        Cancel</BLink>
                    <BLink @click="confirmDelete" class="btn btn-danger">
                        Delete</BLink>
                </div>
            </div>
        </div>
    </BModal>
</template>
