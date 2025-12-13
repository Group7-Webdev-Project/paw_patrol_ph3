// Load and render pet overview cards
let petsList = [];

async function loadPets() {
    try {
        const res = await fetch('./pets-data.json');
        if (!res.ok) throw new Error('Failed to fetch');
        const data = await res.json();
        petsList = data.pets || [];
    } catch (err) {
        console.error('Error loading pets-data.json, falling back to empty list', err);
        petsList = [];
    }
}

function createCard(pet) {
    const a = document.createElement('a');
    a.className = 'pet-card';
    a.href = `pet-details.html?id=${encodeURIComponent(pet.id)}`;

    const imgSrc = (pet.images && pet.images[0]) ? pet.images[0] : './images/adoptImages/name1.jpg';

    a.innerHTML = `
        <div class="card-top">
            <img src="${imgSrc}" alt="${escapeHtml(pet.name)}">
            <div>
                <h3>${escapeHtml(pet.name)}</h3>
                <p>${escapeHtml(pet.type)} • ${escapeHtml(pet.location || '')}</p>
            </div>
        </div>
        <div class="meta">
            <span>${escapeHtml(pet.breed)}</span>
            <span>${escapeHtml(pet.age)}</span>
            <span>${escapeHtml(pet.gender)}</span>
        </div>
    `;

    return a;
}

function escapeHtml(str){
    if (str === null || str === undefined) return '';
    return String(str).replace(/[&<>"]/g, s => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;'}[s]));
}

async function renderCards() {
    await loadPets();
    const grid = document.getElementById('cards-grid');
    if (!grid) return;
    grid.innerHTML = '';
    if (!petsList.length) {
        grid.innerHTML = '<p style="color:#c33; text-align:center; grid-column:1/-1;">No pets available right now.</p>';
        return;
    }

    petsList.forEach(pet => {
        const card = createCard(pet);
        grid.appendChild(card);
    });
}

document.addEventListener('DOMContentLoaded', renderCards);
