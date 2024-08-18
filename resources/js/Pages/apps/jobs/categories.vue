<script>
import { Head } from '@inertiajs/vue3';
import Layout from "@/Layouts/main.vue";
import PageHeader from "@/Components/page-header.vue";

import Lottie from "@/Components/widgets/lottie.vue";
import animationData from "@/Components/widgets/xulniijg.json";
import animationData1 from "@/Components/widgets/oclwxpmm.json";
import animationData2 from "@/Components/widgets/dklbhvrt.json";
import animationData3 from "@/Components/widgets/adwosptt.json";
import animationData4 from "@/Components/widgets/kkcllwsu.json";
import animationData5 from "@/Components/widgets/rahcoaeu.json";
import animationData6 from "@/Components/widgets/smauprql.json";
import animationData7 from "@/Components/widgets/itykargr.json";
import animationData8 from "@/Components/widgets/cnyeuzxc.json";
import animationData9 from "@/Components/widgets/sygggnra.json";
import animationData10 from "@/Components/widgets/hfmdczge.json";
import animationData11 from "@/Components/widgets/xhebrhsj.json";
import animationData12 from "@/Components/widgets/ucvsemjq.json";
import animationData13 from "@/Components/widgets/pvbjsfif.json";
import animationData14 from "@/Components/widgets/auvicynv.json";
import animationData15 from "@/Components/widgets/etwtznjn.json";
import animationData16 from "@/Components/widgets/fhtaantg.json";
import animationData17 from "@/Components/widgets/gsqxdxog.json";
import animationData18 from "@/Components/widgets/hrqwmuhr.json";
import animationData19 from "@/Components/widgets/hzomhqxz.json";
import animationData20 from "@/Components/widgets/kbtmbyzy.json";
import animationData21 from "@/Components/widgets/lupuorrc.json";
import animationData22 from "@/Components/widgets/msoeawqm.json";
import animationData23 from "@/Components/widgets/nkmsrxys.json";
import animationData24 from "@/Components/widgets/pithnlch.json";
import animationData25 from "@/Components/widgets/qhviklyi.json";
import animationData26 from "@/Components/widgets/rhvddzym.json";
import animationData27 from "@/Components/widgets/spxnqpau.json";
import animationData28 from "@/Components/widgets/tdrtiskw.json";
import animationData29 from "@/Components/widgets/tqywkdcz.json";
import animationData30 from "@/Components/widgets/uetqnvvg.json";
import animationData31 from "@/Components/widgets/vaeagfzc.json";
import animationData32 from "@/Components/widgets/yeallgsa.json";
import animationData33 from "@/Components/widgets/zpxybbhl.json";

export default {
  data() {
    return {
      defaultOptions: {
        animationData: animationData
      },
      defaultOptions1: {
        animationData: animationData1
      },
      defaultOptions2: {
        animationData: animationData2
      },
      defaultOptions3: {
        animationData: animationData3
      },
      defaultOptions4: {
        animationData: animationData4
      },
      defaultOptions5: {
        animationData: animationData5
      },
      defaultOptions6: {
        animationData: animationData6
      },
      defaultOptions7: {
        animationData: animationData7
      },
      defaultOptions8: {
        animationData: animationData8
      },
      defaultOptions9: {
        animationData: animationData9
      },
      defaultOptions10: {
        animationData: animationData10
      },
      defaultOptions11: {
        animationData: animationData11
      },
      defaultOptions12: {
        animationData: animationData12
      },
      defaultOptions13: {
        animationData: animationData13
      },
      defaultOptions14: {
        animationData: animationData14
      },
      defaultOptions15: {animationData: animationData15},
      defaultOptions16: {animationData: animationData16},
      defaultOptions17: {animationData: animationData17},
      defaultOptions18: {animationData: animationData18},
      defaultOptions19: {animationData: animationData19},
      defaultOptions20: {animationData: animationData20},
      defaultOptions21: {animationData: animationData21},
      defaultOptions22: {animationData: animationData22},
      defaultOptions23: {animationData: animationData23},
      defaultOptions24: {animationData: animationData24},
      defaultOptions25: {animationData: animationData25},
      defaultOptions26: {animationData: animationData26},
      defaultOptions27: {animationData: animationData27},
      defaultOptions28: {animationData: animationData28},
      defaultOptions29: {animationData: animationData29},
      defaultOptions30: {animationData: animationData30},
      defaultOptions31: {animationData: animationData31},
      defaultOptions32: {animationData: animationData32},
      defaultOptions33: {animationData: animationData33},

    };
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
                  <input type="text" class="form-control search" placeholder="Search for job categories...">
                  <i class="ri-search-line search-icon"></i>
                </div>
              </BCol>
              <BCol lg="auto">
                <div class="d-md-flex text-nowrap gap-2">
                  <BButton variant="info" class="add-btn"><i class="ri-add-fill me-1 align-bottom"></i> Add Categories
                  </BButton>
                  <BButton variant="danger"><i class="ri-filter-2-line me-1 align-bottom"></i> Filters</BButton>

                  <BDropdown variant="link" right toggle-class="text-decoration-none p-0"
                    class="card-header-dropdown" no-caret>
                    <template #button-content> <span class="fs-18 btn btn-soft-info"><i class="ri-more-2-fill"></i></span>
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
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions" :height="50"
              :width="50" />
            <h5 class="mt-4">xulniijg</h5>
            <p class="text-muted mb-0">102 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions1" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">oclwxpmm</h5>
            <p class="text-muted mb-0">64 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions2" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">dklbhvrt</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions3" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">adwosptt</h5>
            <p class="text-muted mb-0">49 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions4" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">kkcllwsu</h5>
            <p class="text-muted mb-0">97 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions5" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">rahcoaeu</h5>
            <p class="text-muted mb-0">312 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions6" :trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">smauprql</h5>
            <p class="text-muted mb-0">62 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions7" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">itykargr</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions8" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">cnyeuzxc</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions9" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">sygggnra</h5>
            <p class="text-muted mb-0">746 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions10" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">hfmdczge</h5>
            <p class="text-muted mb-0">642 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions11" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">xhebrhsj</h5>
            <p class="text-muted mb-0">364 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions12" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">ucvsemjq</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions13" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">pvbjsfif</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions14" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">auvicynv</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions15" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">etwtznjn</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions16" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">fhtaantg</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions17" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">gsqxdxog</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions18" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">hrqwmuhr</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions19" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">hzomhqxz</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions20" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">kbtmbyzy</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions21" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">lupuorrc</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions22" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">msoeawqm</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions23" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">nkmsrxys</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions24" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">pithnlch</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions25" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">qhviklyi</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions26" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">rhvddzym</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions27" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">spxnqpau</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions28" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">tdrtiskw</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions29" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">tqywkdcz</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions30" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">uetqnvvg</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions31" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">vaeagfzc</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions32" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">yeallgsa</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
      <BCol>
        <BCard no-body>
          <BCardBody class="text-center py-4">
            <lottie class="avatar-xl icon-primary" colors="primary:#405189" :options="defaultOptions33" trigger="hover"
              :height="50" :width="50" />
            <h5 class="mt-4">zpxybbhl</h5>
            <p class="text-muted mb-0">35 Position</p>
          </BCardBody>
        </BCard>
      </BCol>
    </BRow>

    <BRow>
      <BCol lg="12">
        <div class="text-center mb-3">
          <BButton variant="link" class="text-success mt-2 material-shadow-none" id="loadmore"><i
              class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load More </BButton>
        </div>
      </BCol>
    </BRow>
</Layout></template>
