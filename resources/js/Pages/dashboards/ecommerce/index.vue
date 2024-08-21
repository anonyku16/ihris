<script>
import { Link, Head } from '@inertiajs/vue3';
import getChartColorsArray from "@/common/getChartColorsArray";
import { layoutComputed } from "@/state/helpers.js"
import simplebar from "simplebar-vue";
import { CountTo } from "vue3-count-to";

import { Swiper, SwiperSlide } from "swiper/vue";
import { Autoplay, Mousewheel } from "swiper/modules";
import "swiper/css";
import "swiper/css/autoplay";
import "swiper/css/mousewheel";

import flatPickr from "vue-flatpickr-component";
import "flatpickr/dist/flatpickr.css";

import Layout from "@/Layouts/main.vue";
import Revenue from "./revenue.vue";
import SalesLocation from "./sales-location.vue";

export default {
  components: {
    CountTo,
    Layout,
    Swiper,
    SwiperSlide,
    flatPickr,
    simplebar,
    Revenue,
    SalesLocation,
    Link,
    Head
  },
  data() {
    return {
      date: "2022-01-01 to 2022-01-31",
      config: {
        mode: "range",
      },
      series: [44, 55, 41, 17, 15],
      chartOptions: {
        labels: ["Direct", "Social", "Email", "Other", "Referrals"],
        chart: {
          height: 333,
          type: "donut",
        },
        legend: {
          position: "bottom",
        },
        stroke: {
          show: false,
        },
        dataLabels: {
          dropShadow: {
            enabled: false,
          },
        },
      },
      Autoplay, Mousewheel
    };
  },
  methods: {
    rightcolumn() {
      if (document.querySelector('.layout-rightside-col').classList.contains('d-block')) {
        document.querySelector('.layout-rightside-col').classList.remove('d-block');
        document.querySelector('.layout-rightside-col').classList.add('d-none');
      } else {
        document.querySelector('.layout-rightside-col').classList.remove('d-none');
        document.querySelector('.layout-rightside-col').classList.add('d-block');
      }
    },

    resizerightcolumn() {
      const element = document.querySelector('.layout-rightside-col');

      if (element) {
        if (window.outerWidth < 1699) {
          element.classList.remove("d-block");
          element.classList.add("d-none");
        } else {
          element.classList.add("d-block");
          element.classList.remove("d-none");
        }
      }

      if (document.documentElement.getAttribute("data-layout") === "semibox") {
        element.classList.remove("d-block");
        element.classList.add("d-none");
      }
    },

    hiderightcolumn() {
      const element = document.querySelector('.layout-rightside-col');
      if (element.classList.contains('d-block')) {
        element.classList.remove("d-block");
        element.classList.add("d-none");
      }
    },
    handleUpdate() {
      setTimeout(() => {
        switch (this.layoutTheme) {
          case "default":
            this.chartOptions = {
              ...this.chartOptions,
              colors: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]')
            };
            break;
          case "saas":
            this.chartOptions = {
              ...this.chartOptions,
              colors: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]')
            };
            break;
          case "corporate":
            this.chartOptions = {
              ...this.chartOptions,
              colors: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]')
            };
            break;
          case "galaxy":
            this.chartOptions = {
              ...this.chartOptions,
              colors: getChartColorsArray('["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]')
            };
            break;
          case "material":
            this.chartOptions = {
              ...this.chartOptions,
              colors: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]')
            };
            break;
          case "creative":
            this.chartOptions = {
              ...this.chartOptions,
              colors: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]')
            };
            break;
          case "minimal":
            this.chartOptions = {
              ...this.chartOptions,
              colors: getChartColorsArray('["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]')
            };
            break;
          case "modern":
            this.chartOptions = {
              ...this.chartOptions,
              colors: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]')
            };
            break;
          case "interactive":
            this.chartOptions = {
              ...this.chartOptions,
              colors: getChartColorsArray('["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]')
            };
            break;
          case "classic":
            this.chartOptions = {
              ...this.chartOptions,
              colors: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]')
            };
            break;
          case "vintage":
            this.chartOptions = {
              ...this.chartOptions,
              colors: getChartColorsArray('["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]')
            };
            break;
        }

      }, 200)
    },
  },
  mounted() {
    window.addEventListener("resize", this.resizerightcolumn);
    this.handleUpdate();
  },
  computed: {
    ...layoutComputed,
    layoutTheme() {
      return this.$store ? this.$store.state.layout.layoutTheme : {} || {};
    }
  },
  watch: {
    layoutTheme() {
      this.handleUpdate();
    }
  },
};
</script>

<template>
  <Layout>

    <Head title="Dashboard" />
    <BRow>
      <BCol>
        <div class="h-100">
          <BRow class="mb-3 pb-1">
            <BCol cols="12">
              <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                <div class="flex-grow-1">
                  <h4 class="fs-16 mb-1">Hallo, Super User!</h4>
                  <p class="text-muted mb-0">
                    Here's what's happening today.
                  </p>
                </div>
                <div class="mt-3 mt-lg-0">
                  <form action="javascript:void(0);">
                    <BRow class="g-3 mb-0 align-items-center">
                      <div class="col-auto">
                        <BButton type="button" variant="soft-info"
                          class="btn-icon waves-effect material-shadow-none layout-rightside-btn" @click="rightcolumn">
                          <i class="ri-arrow-left-right-line"></i>
                        </BButton>
                      </div>
                    </BRow>
                  </form>
                </div>
              </div>
            </BCol>
          </BRow>

          <BRow>
            <BCol xl="3" md="6">
              <BCard no-body class="card-animate">
                <BCardBody>
                  <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                      <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                        Total Active Project
                      </p>
                    </div>
                    <div class="flex-shrink-0">
                      <h5 class="text-success fs-14 mb-0">
                        
                      </h5>
                    </div>
                  </div>
                  <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                      <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                        <count-to :startVal='0' :endVal='12' :duration='5000'></count-to>
                      </h4>
                      <BLink href="" class="text-decoration-underline">See Detail</BLink>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                      <span class="avatar-title bg-success-subtle rounded fs-3">
                        <i class="bx bx-user-circle text-success"></i>
                      </span>
                    </div>
                  </div>
                </BCardBody>
              </BCard>
            </BCol>

            <BCol xl="3" md="6">
              <BCard no-body class="card-animate">
                <BCardBody>
                  <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                      <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                        Expired PKWT
                      </p>
                    </div>
                    <div class="flex-shrink-0">
                      <h5 class="text-success fs-14 mb-0">
                        
                      </h5>
                    </div>
                  </div>
                  <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                      <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                        <count-to :startVal='0' :endVal='103' :duration='3000'></count-to>

                      </h4>
                      <BLink href="" class="text-decoration-underline">See details</BLink>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                      <span class="avatar-title bg-warning-subtle rounded fs-3">
                        <i class="bx bx-user-circle text-warning"></i>
                      </span>
                    </div>
                  </div>
                </BCardBody>
              </BCard>
            </BCol>

            <BCol xl="3" md="6">
              <BCard no-body class="card-animate">
                <BCardBody>
                  <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                      <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                        Expiring Document / Certificate
                      </p>
                    </div>
                    <div class="flex-shrink-0">
                      
                    </div>
                  </div>
                  <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                      <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                        <count-to :startVal='0' :endVal='6' :duration='3000'></count-to>
                      </h4>
                      <BLink href="" class="text-decoration-underline">See Detail</BLink>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                      <span class="avatar-title bg-primary-subtle rounded fs-3">
                        <i class="bx bx-wallet text-primary"></i>
                      </span>
                    </div>
                  </div>
                </BCardBody>
              </BCard>
            </BCol>

            <BCol xl="3" md="6">
              <BCard no-body class="card-animate">
                <BCardBody>
                  <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                      <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                        Eksepsi Waiting for Response
                      </p>
                    </div>
                    <div class="flex-shrink-0">
                      
                    </div>
                  </div>
                  <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                      <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                        <count-to :startVal='0' :endVal='3' :duration='3000'></count-to>
                      </h4>
                      <BLink href="" class="text-decoration-underline">See Detail</BLink>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                      <span class="avatar-title bg-primary-subtle rounded fs-3">
                        <i class="bx bx-wallet text-primary"></i>
                      </span>
                    </div>
                  </div>
                </BCardBody>
              </BCard>
            </BCol>
          </BRow>

          <BRow>
            <BCol xl="8">
              <Revenue />
            </BCol>

            <BCol xl="4">
              <SalesLocation />
            </BCol>
          </BRow>

          
        </div>
      </BCol>

      <div class="col-auto layout-rightside-col d-block">
        <div class="overlay" @click="hiderightcolumn"></div>
        <div class="layout-rightside">
          <BCard no-body class="h-100 rounded-0">
            <BCardBody class="p-0">
              <div class="p-3">
                <h6 class="text-muted mb-0 text-uppercase fw-semibold">
                  Birthday Staff
                </h6>
              </div>
              <simplebar style="max-height: 410px" class="p-3 pt-0">
                <div class="acitivity-timeline acitivity-main">
                  
                  <div class="acitivity-item py-3 d-flex">
                    <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                      <div class="avatar-title bg-success-subtle text-success rounded-circle material-shadow">
                        <i class="ri-cake-2-line"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h6 class="mb-1 lh-base">SITI USTIFATUR RAUDAH</h6>
                      <p class="text-muted mb-1">
                        
                      </p>
                      <small class="mb-0 text-muted">21 August</small>
                    </div>
                  </div>

                  <div class="acitivity-item py-3 d-flex">
                    <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                      <div class="avatar-title bg-success-subtle text-success rounded-circle material-shadow">
                        <i class="ri-cake-2-line"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h6 class="mb-1 lh-base">SELVI AMALIA</h6>
                      <p class="text-muted mb-1">
                        
                      </p>
                      <small class="mb-0 text-muted">21 August</small>
                    </div>
                  </div>

                  <div class="acitivity-item py-3 d-flex">
                    <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                      <div class="avatar-title bg-success-subtle text-success rounded-circle material-shadow">
                        <i class="ri-cake-2-line"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h6 class="mb-1 lh-base">AGUS MULYADI</h6>
                      <p class="text-muted mb-1">
                        
                      </p>
                      <small class="mb-0 text-muted">21 August</small>
                    </div>
                  </div>

                  <div class="acitivity-item py-3 d-flex">
                    <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                      <div class="avatar-title bg-success-subtle text-success rounded-circle material-shadow">
                        <i class="ri-cake-2-line"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h6 class="mb-1 lh-base">ADE SANDI</h6>
                      <p class="text-muted mb-1">
                        
                      </p>
                      <small class="mb-0 text-muted">21 August</small>
                    </div>
                  </div>
                </div>
              </simplebar>

              
              

              
            </BCardBody>
          </BCard>
        </div>
      </div>
    </BRow>
  </Layout>
</template>