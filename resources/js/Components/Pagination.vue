<template>
    <div class="btn-group">
        <Link
            v-for="link in links"
            :key="link.label"
            :class="isActive(link.active)"
            :href="link.url"
            v-html="link.label"
        >
        </Link>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },
    props: ["links"],
    methods: {
        isActive(state) {
            return state ? "btn btn-outline btn-active btn-disable" : "btn btn-outline ";
        },
    },
};
</script>