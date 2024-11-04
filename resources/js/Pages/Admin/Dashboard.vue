<template>
    <Admin>
        <div class="flex flex-wrap">
            <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
                <card-line-chart />
            </div>
            <div class="w-full xl:w-4/12 px-4">
                <card-bar-chart />
            </div>
        </div>
        <div class="flex flex-wrap mt-4">
            <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
                <card-page-visits />
            </div>
            <div class="w-full xl:w-4/12 px-4">
                <card-social-traffic />
            </div>
        </div>
    </Admin>
</template>
<script>
import CardLineChart from "@/Components/Cards/CardLineChart.vue";
import CardBarChart from "@/Components/Cards/CardBarChart.vue";
import CardPageVisits from "@/Components/Cards/CardPageVisits.vue";
import CardSocialTraffic from "@/Components/Cards/CardSocialTraffic.vue";
import Admin from "@/Layouts/Admin.vue";
export default {
    name: "dashboard-page",
    components: {
        Admin,
        CardLineChart,
        CardBarChart,
        CardPageVisits,
        CardSocialTraffic,
    },
};
</script>
