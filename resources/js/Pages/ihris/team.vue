<script>
import { Head } from '@inertiajs/vue3';
import Layout from "@/Layouts/main.vue";
import PageHeader from "@/Components/page-header.vue";

import Lottie from "@/Components/widgets/lottie.vue";
import animationData from "@/Components/widgets/vaeagfzc.json";
import animationData1 from "@/Components/widgets/xulniijg.json";
import animationData2 from "@/Components/widgets/yeallgsa.json";
import animationData3 from "@/Components/widgets/zpxybbhl.json";
import animationData4 from "@/Components/widgets/qhviklyi.json";
import animationData5 from "@/Components/widgets/rahcoaeu.json";
import animationData6 from "@/Components/widgets/rhvddzym.json";
import animationData7 from "@/Components/widgets/smauprql.json";
import animationData8 from "@/Components/widgets/spxnqpau.json";
import animationData9 from "@/Components/widgets/sygggnra.json";
import animationData10 from "@/Components/widgets/tdrtiskw.json";
import animationData11 from "@/Components/widgets/tqywkdcz.json";
import animationData12 from "@/Components/widgets/ucvsemjq.json";
import animationData13 from "@/Components/widgets/uetqnvvg.json";
import animationData14 from "@/Components/widgets/vaeagfzc.json";

export default {
    props: {
        roles: Object,
        sort: String,
        direction: String,
    },
    // data() {
    //     return {
    //         roleIcons: [],
    //     };
    // },

    methods: {
        async fetchRoleIcons() {
            for (const role of this.roles.data) {
                const module = await import(`../../Components/widgets/${role.icon}.json`);
                role.animationData = module.default;
            }
        },

    },
    async created() {
        this.fetchRoleIcons();
    },
    components: {
        Layout,
        PageHeader,
        lottie: Lottie,
        Head
    },
};
</script>

<template>
    <Layout>

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
                                        placeholder="Search for job categories...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </BCol>
                            <BCol lg="auto">
                                <div class="d-md-flex text-nowrap gap-2">
                                    <BButton variant="info" class="add-btn"><i
                                            class="ri-add-fill me-1 align-bottom"></i> Add Categories
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
            <BCol v-for="role in roles.data" :key="role.id">
                <BCard no-body>
                    <BCardBody class="text-center py-4">
                        <lottie class="avatar-xl icon-primary" :height="50" :width="50" :options="{animationData: role.animationData}" :trigger="hover" />
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
