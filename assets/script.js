document.addEventListener('DOMContentLoaded', function() {
    var plans = document.querySelectorAll('.plan');
    plans.forEach(function(plan) {
        plan.addEventListener('click', function() {
            this.classList.toggle('expanded');
            // Collapse other plans
            plans.forEach(function(otherPlan) {
                if (otherPlan !== plan) {
                    otherPlan.classList.remove('expanded');
                }
            });
        });
    });
    const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const planId = this.getAttribute('data-plan-id');
            confirmDelete(planId);
        });
    });
    const editButtons = document.querySelectorAll('.edit-button');
    editButtons.forEach(function(button) {
        button.addEventListener('click', openEditModal);
    });
    document.getElementById("closeButton").addEventListener("click", closeEditModal);
});
    function confirmDelete(planId) {
        if (confirm("Are you sure you want to delete this plan?")) {
            // User clicked "OK," proceed with deletion
            const form = document.createElement("form");
            form.method = "post";
            form.action = "delete_plan.php";
            const input = document.createElement("input");
            input.type = "hidden";
            input.name = "plan_id";
            input.value = planId;
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        } else {
            // User clicked "Cancel," do nothing
        }
    }
    function openEditModal(planId, name, length, difficulty, division) {
        document.getElementById("plan_id").value = planId;
        if (name)
        {
            document.getElementById("name").value = name;
        }
        if (length)
        {
            document.getElementById("length").value = length;
        }
        if (difficulty)
        {
            document.getElementById("difficulty").value = difficulty;
        }
        if (division)
        {
            document.getElementById("division").value = division;
        }
            document.getElementById("editModal").style.display = "block";
    }
    
    function closeEditModal() {
        document.getElementById("editModal").style.display = "none";
    }

    function openCreateModal() {
        document.getElementById("createModal").style.display = "block";
    }
    
    function closeCreateModal() {
        document.getElementById("createModal").style.display = "none";
    }