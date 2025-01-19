console.log('Script Team Presence loaded');

document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.player-button');
    const form = document.querySelector('#presenceForm');
    const submitButton = document.querySelector('#submitButton');
    const resetButton = document.querySelector('#resetButton');
    const playerIdsInput = form.elements['player_ids'];

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            button.classList.toggle('bg-green-500');
            button.classList.toggle('text-white');
            button.classList.toggle('hover:bg-green-800');        
        });
    });

    submitButton.addEventListener('click', () => {
        const selectedButtons = document.querySelectorAll('.bg-green-500');
        const playerIds = Array.from(selectedButtons).map(button => button.dataset.playerId);
        playerIdsInput.value = playerIds.join(',');
        form.submit();
    });

    resetButton.addEventListener('click', () =>{

        buttons.forEach(button => {
            button.classList.remove('bg-green-500', 'text-white',  'hover:bg-green-800')
        })
        playerIdsInput.value = '';
        console.log('reset')
    })


});
