<template>
    <div>
        <h1>Nanny Bookings</h1>

        <div class="container">
            <Filters :activeFilters="activeFilters" :endpoint="endpoint" />

            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Start Date/Time</th>
                        <th>End Date/Time</th>
                        <th>User Name</th>
                        <th>User Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="booking in nannyBookings" :key="booking.id">
                        <td>{{ booking.title }}</td>
                        <td>{{ formatPrice(booking.price) }}</td>
                        <td>{{ formatDateTime(booking.start_datetime) }}</td>
                        <td>{{ formatDateTime(booking.end_datetime) }}</td>
                        <td>{{ booking.user.name }}</td>
                        <td>{{ booking.user.email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import Filters from "../Shared/Filters.vue"

export default {
    components: {
        Filters,
    },
    data() {
        return {
            endpoint: '/'
        };
    },
    props: {
        nannyBookings: Array,
        activeFilters: Object,
    },
    methods: {
        formatPrice(price) {
            return `$ ${price}`
        },
        formatDateTime(dateTime) {
            const options = { year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric' }
            return new Date(dateTime).toLocaleDateString('en-US', options)
        },
    },
};
</script>

<style scoped>
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
    margin-left: 1rem;
    flex: 2;
}

.table th,
.table td {
    padding: 0.5rem;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f2f2f2;
}

.table thead {
    margin-bottom: 0.5rem;
}

h1 {
    text-align: center;
    margin-bottom: 1rem;
}

.container {
  display: flex;
}

.Filters {
  flex: 1;
}

</style>
