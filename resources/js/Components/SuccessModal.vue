<script setup>
import { ref, watch } from 'vue';
import Lottie from "@/Components/widgets/lottie.vue";

const emit = defineEmits(['close']);
const props = defineProps({
    successModal: {
        type: Boolean,
        default: false
    },
    modalInfo: String,
    modalMessage: String
});

import animationData from "@/Components/widgets/lupuorrc.json";

const lottieFile = ref({animationData: animationData});

const modalVisible = ref(props.successModal);

watch(() => props.successModal, (newVal) => {
    modalVisible.value = newVal;
});

const closeModal = () => {
    modalVisible.value = false;
    emit('close');
};

</script>
<template>
    <BModal hide-footer class="v-modal-custom" hide-header-close centered no-close-on-backdrop>
        <div class="modal-body text-center">
            <lottie colors="primary:#121331,secondary:#08a88a" trigger="loop" :options="lottieFile" :height="120"
                :width="120" />
            <div class="mt-4">
                <h4 class="mb-3">{{modalInfo}}</h4>
                <p class="text-muted mb-4">{{modalMessage}}</p>
                <div class="hstack gap-2 justify-content-center">
                    <BLink @click="closeModal" class="btn btn-success">
                        Close</BLink>
                </div>
            </div>
        </div>
    </BModal>
</template>
