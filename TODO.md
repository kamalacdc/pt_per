# TODO: Fix Dashboard Chart Issue

## Completed Tasks
- [x] Identified that the chart is empty due to no data in pelanggans table
- [x] Created PelangganSeeder to populate sample data
- [x] Added PelangganSeeder to DatabaseSeeder
- [x] Ran the seeder to insert sample pelanggans
- [x] Fixed the controller logic to always filter by year, even when month is 'all'

## Verification
- [x] Confirmed categories and pelanggans exist in database (4 categories, 10 pelanggans)
- [x] Chart should now display data for "Jumlah Pelanggan per Category"

## Next Steps
- Test the dashboard to ensure chart displays correctly
- If issues persist, check browser console for JavaScript errors
