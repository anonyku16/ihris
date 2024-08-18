<script setup>
import { computed, reactive } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Layout from "@/Layouts/main.vue";
import PageHeader from "@/Components/page-header.vue";
import CreateCompanyModal from '@/Components/company/modal-create.vue'
import SuccessModal from '@/Components/SuccessModal.vue';
import ConfirmDeleteModal from '@/Components/ConfirmDeleteModal.vue';

const props = defineProps({
    companies: Object,
    sort: String,
    direction: String,
    filters: String
});

const data = reactive({
    sortField: props.sort || 'name',
    sortDirection: props.direction || 'asc',
    search: props.filters || '',
    debounceTimeout: null,
    showModal: false,
    successModal: false,
    deleteModal: false,
    modalInfo: '',
    modalMessage: ''
});

const paginatedLinks = computed(() => {
    return props.companies.links.slice(1, -1); // Removes the first and last elements
});

function onSort(column) {
    data.sortDirection = data.sortDirection === 'asc' ? 'desc' : 'asc';
    router.reload({
        only: ['companies'],
        data: {
            sort: column,
            direction: data.sortDirection
        }
    });
}

function showdetail(data) {
    document.querySelector('.overview-companycode').innerHTML = data.code
    document.querySelector('.overview-companyname').innerHTML = data.name;

    document.querySelector('#nameInput').value = data.name
    document.querySelector('#codeInput').value = data.code
    document.querySelector('#alamatInput').value = data.alamat
    document.querySelector('#npwpInput').value = data.npwp
    document.querySelector('#bpjsInput').value = data.bpjs
    document.querySelector('#bankInput').value = data.nama_bank
    document.querySelector('#rekeningInput').value = data.no_rekening
    document.querySelector('#akunInput').value = data.nama_akun
}

function onSearch() {
    if (data.debounceTimeout) {
        clearTimeout(data.debounceTimeout);
    }
    data.debounceTimeout = setTimeout(() => {
        router.reload({
            only: ['companies'],
            data: {
                search: data.search,
                sort: data.sortField,
                direction: data.sortDirection,
                page: 1
            }
        });
        showdetail(props.companies.data[0])
    }, 500);
}

function openModal() {
    data.showModal = !data.showModal
}

function handleSubmit(form) {
    form.post('/company', {
        onSuccess: (res) => {
            console.log(res)
            data.showModal = false
            data.successModal = true
        }
    })
}

function openDeleteModal() {
    data.deleteModal = !data.deleteModal
}

function handleDelete(id) {

}
</script>

<template>
    <Layout>
        <CreateCompanyModal v-model="data.showModal" @close="data.showModal = false"  @submit="handleSubmit" />
        <SuccessModal v-model="data.successModal" @close="data.successModal = false"/>
        <ConfirmDeleteModal v-model="data.deleteModal" @close="data.deleteModal = false"/>

        <Head title="Companies List" />
        <PageHeader title="Companies List" pageTitle="Companies" />
        <BRow>
            <BCol xxl="9">
                <BCard no-body>
                    <BCardBody>
                        <BForm>
                            <BRow class="g-3 justify-content-between">
                                <BCol xxl="5" sm="6">
                                    <div class="search-box">
                                        <input type="text" class="form-control search bg-light border-light"
                                            id="searchCompany" placeholder="Search for company" @input="onSearch"
                                            v-model="data.search">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </BCol>
                                <BCol lg="auto">
                                    <BButton variant="info" class="add-btn" @click="openModal"><i
                                            class="ri-add-fill me-1 align-bottom"></i> Add Company
                                    </BButton>
                                </BCol>
                            </BRow>
                        </BForm>
                    </BCardBody>
                </BCard>

                <BRow class="job-list-row" id="companies-list">

                    <BCol xxl="3" md="6" v-for="(company, index) of companies.data" :key="index">
                        <BCard no-body class="companiesList-card">
                            <BCardBody>
                                <div class="avatar-sm mx-auto">
                                    <div class="avatar-title bg-light rounded">
                                        <h5 class="company-code">{{ company.code }}</h5>

                                        <!-- <img :src="data.image_src" alt="" class="avatar-xxs companyLogo-img"> -->
                                    </div>
                                </div>
                                <div class="text-center">
                                    <BLink href="#!">
                                        <h5 class="mt-3 company-name">{{ company.name }}</h5>
                                    </BLink>
                                    <!-- <div class="d-none company-desc">{{ company . company_info }}
                  </div> -->
                                    <p class="text-muted industry-type">{{ company.alamat }}</p>
                                    <!-- <div class="d-none"> <span class="employee">{{ company . employee }}</span>
                    <span class="location">{{ company . location }}</span>
                    <span class="rating">{{ company . rating }}</span>
                    <span class="website">{{ company . website }}</span>
                    <span class="email">{{ company . email }}</span>
                    <span class="since">{{ company . since }}</span>
                  </div> -->
                                </div>
                                <div class="d-flex gap-2">
                                    <BButton type="button" variant="secondary"  class="w-100 viewcompany-list btn-animation waves-effect waves-light"
                                        @click="showdetail(company)">
                                        Projects</BButton>
                                    <BButton type="button" variant="soft-primary" class="w-100 viewcompany-list"
                                        @click="showdetail(company)">
                                        Details</BButton>
                                </div>
                            </BCardBody>
                        </BCard>
                    </BCol>


                </BRow>
                <BRow class="g-0 justify-content-end mb-4" id="pagination-element">
                    <BCol sm="6">
                        <div class="d-flex justify-content-end mt-3" v-if="companies.last_page >= 1">
                            <div class="pagination-wrap hstack gap-2">
                                <Link :only="['companies']" class="page-item pagination-prev"
                                    :href=companies.prev_page_url :disabled="companies.current_page <= 1">
                                Previous
                                </Link>
                                <ul class="pagination listjs-pagination mb-0">
                                    <li :class="{
                                        active: companies.current_page - 1 == index,
                                        // disabled: pageNumber == '...',
                                    }" v-for="(link, index) in paginatedLinks" :key="index">
                                        <Link :only="['companies']" class="page" :href=link.url>{{ link.label }}
                                        </Link>
                                    </li>
                                </ul>
                                <Link :only="['companies']" class="page-item pagination-next"
                                    :href=companies.next_page_url
                                    :disabled="companies.current_page >= companies.last_page">
                                Next
                                </Link>
                            </div>
                        </div>
                    </BCol>
                </BRow>
            </BCol>

            <BCol xxl="3">
                <BCard no-body id="company-overview">
                    <BCardBody>
                        <div class="avatar-lg mx-auto mb-3">
                            <div class="avatar-title bg-light rounded">
                                <h5 class="overview-companycode">{{ companies.data[0]?.code }}</h5>
                                <!-- <img src="@assets/images/companies/img-6.png" alt="" class="avatar-sm company-logo" id="company-logo"> -->
                            </div>
                        </div>

                        <div class="text-center">
                            <BLink href="#!">
                                <h5 class="overview-companyname" id="overview-companyname">{{ companies.data[0]?.name
                                    }}
                                </h5>
                            </BLink>
                        </div>
                    </BCardBody>

                    <BCardBody>
                        <BRow class="gy-4 mb-3">
                            <BCol xxl="12" md="12">
                                <div>
                                    <label for="placeholderInput" class="form-label">NAMA PT</label>
                                    <input type="text" class="form-control" id="nameInput" placeholder="NAMA PT"
                                        :value=companies.data[0]?.name>
                                </div>
                            </BCol>
                            <BCol xxl="12" md="12">
                                <div>
                                    <label for="placeholderInput" class="form-label">KODE PT</label>
                                    <input type="text" class="form-control" id="codeInput" placeholder="KODE PT"
                                        :value=companies.data[0]?.code>
                                </div>
                            </BCol>
                            <BCol xxl="12" md="12">
                                <div>
                                    <label for="placeholderInput" class="form-label">ALAMAT</label>
                                    <textarea class="form-control" id="alamatInput"
                                        rows="3">{{ companies.data[0]?.alamat }}</textarea>
                                </div>
                            </BCol>
                            <BCol xxl="12" md="12">
                                <div>
                                    <label for="placeholderInput" class="form-label">NPWP</label>
                                    <input type="text" class="form-control" id="npwpInput" placeholder="NPWP"
                                        :value=companies.data[0]?.npwp>
                                </div>
                            </BCol>
                            <BCol xxl="12" md="12">
                                <div>
                                    <label for="placeholderInput" class="form-label">BPJS</label>
                                    <input type="text" class="form-control" id="bpjsInput" placeholder="BPJS"
                                        :value=companies.data[0]?.bpjs>
                                </div>
                            </BCol>

                            <BCol xxl="12" md="12">
                                <div>
                                    <label for="placeholderInput" class="form-label">BANK</label>
                                    <input type="text" class="form-control" id="bankInput" placeholder="BANK"
                                        :value=companies.data[0]?.nama_bank>
                                </div>
                            </BCol>
                            <BCol xxl="12" md="12">
                                <div>
                                    <label for="placeholderInput" class="form-label">NO REKENING</label>
                                    <input type="text" class="form-control" id="rekeningInput" placeholder="NO REKENING"
                                        :value=companies.data[0]?.no_rekening>
                                </div>
                            </BCol>
                            <BCol xxl="12" md="12">
                                <div>
                                    <label for="placeholderInput" class="form-label">NAMA AKUN</label>
                                    <input type="text" class="form-control" id="akunInput" placeholder="NAMA AKUN"
                                        :value=companies.data[0]?.nama_akun>
                                </div>
                            </BCol>
                        </BRow>

                        <div class="hstack gap-3">
                            <BButton type="button" variant="soft-success"
                                class="custom-toggle w-100 material-shadow-none" data-bs-toggle="button">
                                <span class="icon-on"><i class="ri-check-line align-bottom me-1"></i> Save</span>
                            </BButton>
                            <BLink href="#!" class="btn btn-danger w-100" @click="openDeleteModal">Delete <i
                                    class="ri-arrow-right-line align-bottom"></i>
                            </BLink>
                        </div>
                    </BCardBody>
                </BCard>
            </BCol>
        </BRow>
    </Layout>
</template>
