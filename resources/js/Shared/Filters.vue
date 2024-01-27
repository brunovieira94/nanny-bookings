<template>
    <div>
        <form @submit.prevent="applyFilters" class="filter-form">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" v-model="filters.title" class="form-control">
            </div>
            <div class="form-group">
                <label for="minPrice">Min Price:</label>
                <input type="number" v-model="filters.minPrice" class="form-control">
            </div>
            <div class="form-group">
                <label for="maxPrice">Max Price:</label>
                <input type="number" v-model="filters.maxPrice" class="form-control">
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" v-model="filters.date" class="form-control">
            </div>
            <div class="form-group">
                <label for="userName">User Name:</label>
                <input type="text" v-model="filters.userName" class="form-control">
            </div>
            <div class="form-group">
                <label for="userEmail">User Email:</label>
                <input type="text" v-model="filters.userEmail" class="form-control">
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Apply</button>
                <button @click="clearFilters" class="btn btn-secondary">Clear</button>
            </div>
        </form>
    </div>
</template>


<script>

export default {
    props: {
        endpoint: String,
        activeFilters: Object,
    },
    data() {
        return {
            filters: {
                title: this.activeFilters.title,
                minPrice: this.activeFilters.minPrice,
                maxPrice: this.activeFilters.maxPrice,
                date: this.activeFilters.date,
                userName: this.activeFilters.userName,
                userEmail: this.activeFilters.userEmail,
            },
        };
    },
    methods: {
        async applyFilters() {
            try {
                await this.$inertia.get(`${this.endpoint}`, this.filters, { preserveState: true, replace: true })
            } catch (error) {
                console.error('Error applying filters:', error)
            }
        },
        clearFilters() {
            for (let key in this.filters) {
                delete this.filters[key]
            }
        },
    },
};
</script>

<style scoped>
.filter-form {
    max-width: 200px;
    margin: 20px auto;
}

.form-group {
    margin-bottom: 8px;
}

label {
    margin-bottom: 3px;
    display: block;
}

.form-control {
    width: 100%;
    padding: 6px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 12px;
}

.btn-group {
    display: flex;
    justify-content: space-between;
}

.btn {
    flex: 1;
    padding: 6px;
    margin-right: 5px;
    cursor: pointer;
    font-size: 12px;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
}

.btn-secondary {
    background-color: #6c757d;
    color: #fff;
    border: none;
}
</style>
