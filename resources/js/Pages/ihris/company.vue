<script>
import { Head, Link } from '@inertiajs/vue3';
import Layout from "@/Layouts/main.vue";
import PageHeader from "@/Components/page-header.vue";

export default {
  props: {
    companies: Object,
    sort: String,
    direction: String,
  },
  data() {
    return {
      sortField: this.sort || 'name',
      sortDirection: this.direction || 'asc',
      links: this.companies.links.slice(1, -1)
    };
  },
  components: {
    Layout,
    PageHeader,
    Head, Link
  },
  methods: {
    onSort(column) {
      this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
      router.reload({
        only: ['companies'],
        data: {
          sort: column,
          direction: this.sortDirection
        }
      })
    },
    showdetail(data) {
      document.querySelector('.company-code').innerHTML = data.code
      document.querySelector('.overview-companyname').innerHTML = data.name;
      
      document.querySelector('#nameInput').value = data.name
      document.querySelector('#codeInput').value = data.code
      document.querySelector('#alamatInput').value = data.alamat
      document.querySelector('#npwpInput').value = data.npwp
      document.querySelector('#bpjsInput').value = data.bpjs
      document.querySelector('#bankInput').value = data.nama_bank
      document.querySelector('#rekeningInput').value = data.no_rekening
      document.querySelector('#akunInput').value = data.nama_akun
    },
  },
};
</script>

<template>
  <Layout>
    <Head title="Companies List" />
    <PageHeader title="Companies List" pageTitle="Companies" />
    <BRow>
      <BCol xxl="9">
        <BCard no-body>
          <BCardBody>
            <BForm>
              <BRow class="g-3">
                <BCol xxl="5" sm="6">
                  <div class="search-box">
                    <input type="text" class="form-control search bg-light border-light" id="searchCompany"
                      placeholder="Search for company, industry type...">
                    <i class="ri-search-line search-icon"></i>
                  </div>
                </BCol>

                <BCol xxl="2" sm="4">
                  <BButton type="button" variant="success" class="w-100" >
                    <i class="ri-equalizer-fill me-1 align-bottom"></i> Filters
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
                  <!-- <div class="d-none company-desc">{{ company.company_info }} 
                  </div> -->
                  <p class="text-muted industry-type">{{ company.alamat }}</p>
                  <!-- <div class="d-none"> <span class="employee">{{ company.employee }}</span>
                    <span class="location">{{ company.location }}</span>
                    <span class="rating">{{ company.rating }}</span>
                    <span class="website">{{ company.website }}</span>
                    <span class="email">{{ company.email }}</span>
                    <span class="since">{{ company.since }}</span>
                  </div> -->
                </div>
                <div>
                  <BButton type="button" variant="soft-primary" class="w-100 viewcompany-list" @click="showdetail(company)">
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
                <Link :only="['companies']" class="page-item pagination-prev" :href=companies.prev_page_url :disabled="companies.current_page <= 1">
                  Previous
                </Link>
                <ul class="pagination listjs-pagination mb-0">
                  <li :class="{
                    active: companies.current_page-1 == index,
                    // disabled: pageNumber == '...',
                  }" v-for="(link, index) in links" :key="index">
                    <Link :only="['companies']" class="page" :href=link.url>{{ link.label }}</Link>
                  </li>
                </ul>
                <Link :only="['companies']" class="page-item pagination-next" :href=companies.next_page_url :disabled="companies.current_page >= companies.last_page">
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
                <h5>{{ companies.data[0].code }}</h5>
                <!-- <img src="@assets/images/companies/img-6.png" alt="" class="avatar-sm company-logo" id="company-logo"> -->
              </div>
            </div>

            <div class="text-center">
              <BLink href="#!">
                <h5 class="overview-companyname" id="overview-companyname">{{companies.data[0].name}}</h5>
              </BLink>
            </div>
          </BCardBody>

          <BCardBody>
            <BRow class="gy-4 mb-3">
              <BCol xxl="12" md="12">
                  <div>
                      <label for="placeholderInput" class="form-label">NAMA PT</label>
                      <input type="text" class="form-control" id="nameInput" placeholder="NAMA PT" :value=companies.data[0].name>
                  </div>
              </BCol>
              <BCol xxl="12" md="12">
                  <div>
                      <label for="placeholderInput" class="form-label">KODE PT</label>
                      <input type="text" class="form-control" id="codeInput" placeholder="KODE PT" :value=companies.data[0].code>
                  </div>
              </BCol>
              <BCol xxl="12" md="12">
                  <div>
                      <label for="placeholderInput" class="form-label">ALAMAT</label>
                      <textarea class="form-control" id="alamatInput" rows="3">{{companies.data[0].alamat }}</textarea>
                  </div>
              </BCol>
              <BCol xxl="12" md="12">
                  <div>
                      <label for="placeholderInput" class="form-label">NPWP</label>
                      <input type="text" class="form-control" id="npwpInput" placeholder="NPWP" :value=companies.data[0].npwp>
                  </div>
              </BCol>
              <BCol xxl="12" md="12">
                  <div>
                      <label for="placeholderInput" class="form-label">BPJS</label>
                      <input type="text" class="form-control" id="bpjsInput" placeholder="BPJS" :value=companies.data[0].bpjs>
                  </div>
              </BCol>

              <BCol xxl="12" md="12">
                  <div>
                      <label for="placeholderInput" class="form-label">BANK</label>
                      <input type="text" class="form-control" id="bankInput" placeholder="BANK" :value=companies.data[0].nama_bank>
                  </div>
              </BCol>
              <BCol xxl="12" md="12">
                  <div>
                      <label for="placeholderInput" class="form-label">NO REKENING</label>
                      <input type="text" class="form-control" id="rekeningInput" placeholder="NO REKENING" :value=companies.data[0].no_rekening>
                  </div>
              </BCol>
              <BCol xxl="12" md="12">
                  <div>
                      <label for="placeholderInput" class="form-label">NAMA AKUN</label>
                      <input type="text" class="form-control" id="akunInput" placeholder="NAMA AKUN" :value=companies.data[0].nama_akun>
                  </div>
              </BCol>
            </BRow>

            <div class="hstack gap-3">
              <BButton type="button" variant="soft-success" class="custom-toggle w-100 material-shadow-none" data-bs-toggle="button">
                <span class="icon-on"><i class="ri-add-line align-bottom me-1"></i> Edit</span>
              </BButton>
              <BLink href="#!" class="btn btn-danger w-100">Delete <i class="ri-arrow-right-line align-bottom"></i>
              </BLink>
            </div>
          </BCardBody>
        </BCard>
      </BCol>
    </BRow>
  </Layout>
</template>