export function timeNow() {
    const now = new Date();
    return now.toLocaleDateString('id-ID', { month: 'short', day: 'numeric', year: 'numeric' });
}