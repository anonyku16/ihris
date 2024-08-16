<script>
import { Head } from '@inertiajs/vue3';
import Layout from "@/Layouts/main.vue";
import PageHeader from "@/Components/page-header.vue";

import Lottie from "@/Components/widgets/lottie.vue";
import { onMounted, reactive } from 'vue';
import CreateTeamModal from '@/Components/team/modal-create.vue'
export default {
    props: {
        roles: Object,
        sort: String,
        direction: String,
    },
    data(){
        return {
            showModal: false
        };
    },
    setup(props) {
        // Create a reactive copy of roles data with an additional animationData property
        const rolesWithAnimationData = reactive(
            props.roles.data.map(role => ({
                ...role,
                animationData: null
            }))
        );

        // Fetch the role icons when the component is mounted
        onMounted(async () => {
            for (const role of rolesWithAnimationData) {
                try {
                    const module = await import(`../../Components/widgets/${role.icon}.json`);
                    role.animationData = module.default;  // Direct assignment in Vue 3
                } catch (error) {
                    console.error(`Failed to load Lottie file for ${role.icon}:`, error);
                }
            }
        });

        return {
            rolesWithAnimationData
        };
    },
    methods: {
        openModal() {
            this.showModal = !this.showModal
        }
    },
    components: {
        Layout,
        PageHeader,
        lottie: Lottie,
        Head,
        CreateTeamModal
    }
};
</script>

<template>
    <Layout>
        <CreateTeamModal v-model="showModal" />
        <Head title="Job Categories" />
        <PageHeader title="Job Categories" pageTitle="Jobs" />
        <BRow>
            <BCol col lg="12">
                <BCard no-body>
                    <BCardHeader>
                        <BRow class="justify-content-between gy-3">
                            <BCol lg="3">
                                <div class="search-box">
                                    <input type="text" class="form-control search"
                                        placeholder="Search for teams...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </BCol>
                            <BCol lg="auto">
                                <div class="d-md-flex text-nowrap gap-2">
                                    <BButton variant="info" class="add-btn" @click="openModal"><i
                                            class="ri-add-fill me-1 align-bottom"></i> Add Teams
                                    </BButton>
                                    <BButton variant="danger"><i class="ri-filter-2-line me-1 align-bottom"></i> Filters
                                    </BButton>

                                    <BDropdown variant="link" right toggle-class="text-decoration-none p-0"
                                        class="card-header-dropdown" no-caret>
                                        <template #button-content> <span class="fs-18 btn btn-soft-info"><i
                                                    class="ri-more-2-fill"></i></span>
                                        </template>
                                        <BDropdownItem href="#">All</BDropdownItem>
                                        <BDropdownItem href="#">Last Week</BDropdownItem>
                                        <BDropdownItem href="#">Last Month</BDropdownItem>
                                        <BDropdownItem href="#">Last Year </BDropdownItem>
                                    </BDropdown>

                                </div>
                            </BCol>
                        </BRow>
                    </BCardHeader>
                </BCard>
            </BCol>
        </BRow>

        <BRow class="row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
            <BCol v-for="role in rolesWithAnimationData" :key="role.id">
                <BCard no-body>
                    <BCardBody class="text-center py-4">
                        <lottie v-if="role.animationData" class="avatar-xl icon-primary" :height="50" :width="50"
                            :options="{ animationData: role.animationData }" />
                        <BLink href="#!" class="stretched-link">
                            <h5 class="mt-4">{{ role.title }}</h5>
                        </BLink>
                        <p class="text-muted mb-0">{{ role.description }}</p>
                    </BCardBody>
                </BCard>
            </BCol>
        </BRow>
    </Layout>
</template>
