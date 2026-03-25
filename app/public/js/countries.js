document.addEventListener('alpine:init', () => {
    Alpine.data('countryExplorer', (initialSearch, initialCountries) => ({
        search: initialSearch,
        showDetails: null,
        allCountries: initialCountries,
        
        filteredCountries() {
            if (!this.search) return this.allCountries.slice(0, 10);
            return this.allCountries.filter(c => 
                (c.name.common || '').toLowerCase().includes(this.search.toLowerCase())
            ).slice(0, 10);
        },
        
        formatNumber(num) {
            return new Intl.NumberFormat().format(num || 0);
        },
        
        toggleDetails(countryId) {
            this.showDetails = (this.showDetails === countryId) ? null : countryId;
        }
    }));
});
