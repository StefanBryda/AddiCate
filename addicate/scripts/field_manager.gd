extends Node2D

@export var field_stage: int = 1

@onready var flower_scene = preload("res://scenes//Flower.tscn")  

func _ready():
	match field_stage:
		1:
			_spawn_flower(Vector2(200, 1200), false)
		2:
			_spawn_flower(Vector2(250, 310), true)
		3:
			_spawn_flower(Vector2(220, 280), true)
			_spawn_flower(Vector2(280, 320), true)

func _spawn_flower(position: Vector2, interactable: bool):
	var flower = flower_scene.instantiate()
	flower.position = position
	if not interactable:
		flower.set_process_input(false)
		flower.modulate = Color(1, 1, 1, 0.5) # Makes flower semi-transparent
	add_child(flower)
