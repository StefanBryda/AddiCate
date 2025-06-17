extends Area2D

@export var interactable := true

func _ready():
    if not interactable:
        set_process_input(false)
        modulate = Color(1, 1, 1, 0.5)  # semi-transparent

func _input_event(viewport, event, shape_idx):
    if interactable and event is InputEventMouseButton and event.pressed:
        queue_free()
