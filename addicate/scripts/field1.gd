extends Node2D

@onready var flower_scene = preload("res://scenes//Flower.tscn")

func _ready():
	var flower = flower_scene.instantiate()
	flower.position = Vector2(300, 500)
	flower.interactable = false
	add_child(flower)
