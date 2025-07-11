extends Node2D

@onready var flower_scene = preload("res://scenes//Flower.tscn") # Adjust path if needed

func _ready():
	var flower = flower_scene.instantiate()
	flower.position = Vector2(350, 500)
	flower.interactable = true  # make the flower clickable
	add_child(flower)
