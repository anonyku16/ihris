<script>
import { Link } from '@inertiajs/vue3';
// import menu from './widgets/menu.yaml';
import menu from "@/common/data/menu.yaml"

export default {
  components: {
    Link
  },
  // props: {
  //   item: {
  //     type: Object,
  //     required: true
  //   }
  // },
  data() {
    return {
      menu: menu
    }
  }
  // methods: {
  //   separatorClass(type) {
  //     return type === 'horizontal' ? 'menu-separator-horizontal' : 'menu-separator-vertical';
  //   }
  // }
}
</script>

<template>
  <ul class="navbar-nav h-100" id="navbar-nav"> 
    <li v-for="item in menu" :key="item.name"
      :class="[item, { 'menu-title': item.separator, 'nav-item': !item.separator }]">
      <span v-if="item.separator" data-key="t-menu"> {{ item.name }}</span>
      <template v-else-if="!item.children">
        <Link class="nav-link menu-link" :href="item.path">
        <i :class="item.icon"></i>
        <span :data-key="`t-${item.name.replace(/\s/g, '')}`">{{ item.name }}</span>
        </Link>
      </template>
      <template v-else>
        <Link class="nav-link menu-link" :href="`#sidebar${item.name.replace(/\s/g, '')}`" data-bs-toggle="collapse" role="button"
          aria-expanded="false" :aria-controls="`sidebar${item.name.replace(/\s/g, '')}`">
        <i :class="item.icon"></i>
        <span :data-key="`t-${item.name.replace(/\s/g, '')}`"> {{ item.name }}</span>
        </Link>
        <div class="collapse menu-dropdown" :id="`sidebar${item.name.replace(/\s/g, '')}`">
          <ul class="nav nav-sm flex-column">
            <li class="nav-item" v-for="child in item.children" :key="child.name">
              <Link v-if="!child.children" :href="child.path" class="nav-link" :data-key="`t-${child.name.replace(/\s/g, '')}`">
              {{ child.name }}
              </Link>
              <template v-else>
                <Link class="nav-link menu-link" :href="`#sidebar${child.name.replace(/\s/g, '')}`" data-bs-toggle="collapse" role="button"
                  aria-expanded="false" :aria-controls="`sidebar${child.name.replace(/\s/g, '')}`">
                <span :data-key="`t-${child.name.replace(/\s/g, '')}`"> {{ child.name }}</span>
                </Link>

                <div class="collapse menu-dropdown" :id="`sidebar${child.name.replace(/\s/g, '')}`">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item" v-for="gchild in child.children" :key="gchild.name">
                      <Link v-if="!gchild.children" :href="gchild.path" class="nav-link" :data-key="`t-${gchild.name.replace(/\s/g, '')}`">
                      {{ gchild.name }}
                      </Link>
                      <template v-else>
                        <Link class="nav-link menu-link" :href="`#sidebar${gchild.name.replace(/\s/g, '')}`" data-bs-toggle="collapse"
                          role="button" aria-expanded="false" :aria-controls="`sidebar${gchild.name.replace(/\s/g, '')}`">
                        <span :data-key="`t-${gchild.name.replace(/\s/g, '')}`"> {{ gchild.name }}</span>
                        </Link>

                        <div class="collapse menu-dropdown" :id="`sidebar${gchild.name.replace(/\s/g, '')}`">
                          <ul class="nav nav-sm flex-column">
                            <li class="nav-item" v-for="ggchild in gchild.children" :key="ggchild.name">
                              <Link :href="ggchild.path" class="nav-link" :data-key="`t-${ggchild.name.replace(/\s/g, '')}`">
                              {{ ggchild.name }}
                              </Link>
                            </li>
                          </ul>
                        </div>
                      </template>
                    </li>
                  </ul>
                </div>
              </template>
            </li>
          </ul>
        </div>
      </template>
    </li>
  </ul>
</template>
