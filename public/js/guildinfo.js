document.querySelectorAll('.guild-container').forEach(item => {
    item.addEventListener('click', function() {
        let guildId = this.getAttribute('data-id');
        let membersListDiv = this.querySelector('.members-list');
        fetch(`/dashboard/guilds/${guildId}/members`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                let output = '';
                if (data.members) {
                    data.members.forEach(member => {
                        output += `<div class="member">
                                       <span class="member-name">${member.name}</span>
                                       <span class="member-power">Power: ${member.powerDetails ? member.powerDetails.power : 'Pas de pouvoir'}</span>
                                   </div>`;
                    });
                }
                membersListDiv.innerHTML = output;
                membersListDiv.style.display = 'block';
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});
